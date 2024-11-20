<?php

namespace App\Http\Controllers\Home;

use App\Models\Car;
use App\Models\House;
use App\Models\Truck;
use App\Models\Appliance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // public function addToCart(Request $request)
    // {
    //     // Find the car by ID
    //     $car = Car::findOrFail($request->car_id);

    //     // Get existing cart from session or initialize a new array
    //     $cart = Session::get('cart', []);

    //     // Check if the car is already in the cart
    //     if (isset($cart[$car->id])) {
    //         // Increase quantity if already in cart
    //         $cart[$car->id]['quantity']++;
    //     } else {
    //         // Add new car to cart
    //         $cart[$car->id] = [
    //             'id' => $car->id,
    //             'name' => $car->name,
    //             'price' => $car->price,
    //             'image' => $car->image,
    //             'quantity' => 1,
    //         ];
    //     }

    //     // Calculate the cart total
    //     $total = array_sum(array_map(function ($item) {
    //         return $item['price'] * $item['quantity'];
    //     }, $cart));

    //     // Save updated cart and total to session
    //     Session::put('cart', $cart);
    //     Session::put('cart_total', $total);

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'car added to cart!',
    //         'cartItemCount' => count($cart),
    //         'cartTotal' => $total,
    //     ]);
    // }


    public function addToCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer',
            'type' => 'required|string',
        ]);

        // Map model types to classes
        $models = [
            'car' => Car::class,
            'appliance' => Appliance::class,
            'truck' => Truck::class,
            'house' => House::class,
        ];

        // Check if the provided type exists in the mapping
        if (!array_key_exists($request->type, $models)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid item type.',
            ], 400);
        }

        // Dynamically find the model and item
        $modelClass = $models[$request->type];
        $item = $modelClass::findOrFail($request->id);

        // Get existing cart from session or initialize a new array
        $cart = Session::get('cart', []);

        // Create a unique key for the cart item (type and ID)
        $key = $request->type . '_' . $item->id;

        // Check if the item is already in the cart
        if (isset($cart[$key])) {
            // Increase quantity if already in cart
            $cart[$key]['quantity']++;
        } else {
            // Add new item to cart
            $cart[$key] = [
                'id' => $item->id,
                'type' => $request->type,
                'name' => $item->name,
                'price' => $item->price,
                'image' => $item->image,
                'quantity' => 1,
            ];
        }

        // Calculate the cart total
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Save updated cart and total to session
        Session::put('cart', $cart);
        Session::put('cart_total', $total);

        return response()->json([
            'status' => 'success',
            'message' => ucfirst($request->type) . ' added to cart!',
            'cartItemCount' => count($cart),
            'cartTotal' => $total,
        ]);
    }






    public function removeFromCart(Request $request)
    {
        // Get the product ID from the request
        $productId = $request->product_id;

        // Get the current cart from the session
        $cart = Session::get('cart', []);

        // If the product exists in the cart, remove it
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        // Calculate the updated cart total
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Update the session with the new cart and total
        Session::put('cart', $cart);
        Session::put('cart_total', $total);

        // Return a response with the updated cart info
        return response()->json([
            'status' => 'success',
            'message' => 'Product removed from cart!',
            'cartItemCount' => count($cart),
            'cartTotal' => $total,
        ]);
    }



    public function index()
    {
        // Display the cart with cars and total
        $cart = Session::get('cart', []);
        $cartTotal = Session::get('cart_total', 0);

        return view('home.view_cart', compact('cart', 'cartTotal'));
    }


    public function updateCart(Request $request)
    {
        // Validate the input to ensure quantity is a positive integer
        $request->validate([
            'product_id' => 'required|integer|exists:cars,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Retrieve the current cart from the session
        $cart = Session::get('cart', []);

        // Check if the item exists in the cart
        if (isset($cart[$productId])) {
            // Update the quantity of the item
            $cart[$productId]['quantity'] = $quantity;

            // Save the updated cart in session
            Session::put('cart', $cart);

            // Recalculate the total cost of the cart
            $total = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart));
            Session::put('cart_total', $total);

            return response()->json([
                'status' => 'success',
                'message' => 'Cart updated successfully',
                'cartTotal' => $total,
                'cartItemCount' => count($cart),
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Product not found in cart',
        ], 404);
    }



    public function checkout()
    {
        // Retrieve the cart and total from the session
        $cart = Session::get('cart', []);
        $cartTotal = Session::get('cart_total', 0);

        // Check if the cart is empty
        if (empty($cart)) {
            return redirect()->route('home.view_cart')->with('error', 'Your cart is empty. Please add items to the cart before checkout.');
        }

        // Pass the cart items and total amount to the checkout view
        return view('home.checkout', compact('cart', 'cartTotal'));
    }
}