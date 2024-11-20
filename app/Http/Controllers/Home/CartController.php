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
        // Validate the request
        $request->validate([
            'key' => 'required|string', // Key uniquely identifies the cart item
        ]);

        $cartKey = $request->key;

        // Retrieve the current cart from the session
        $cart = Session::get('cart', []);

        // If the item exists in the cart, remove it
        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
        }

        // Calculate the updated cart total
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Update the session
        Session::put('cart', $cart);
        Session::put('cart_total', $total);

        // Return response
        return response()->json([
            'status' => 'success',
            'message' => 'Item removed from cart!',
            'cartItemCount' => count($cart),
            'cartTotal' => $total,
        ]);
    }

    public function index()
    {
        // Retrieve the cart and total from session
        $cart = Session::get('cart', []);
        $cartTotal = Session::get('cart_total', 0);

        // Return the cart view
        return view('cart.view_cart', compact('cart', 'cartTotal'));
    }

    public function updateCart(Request $request)
    {
        // Validate the input
        $request->validate([
            'key' => 'required|string', // Unique cart key
            'quantity' => 'required|integer|min:1', // Quantity must be at least 1
        ]);

        $cartKey = $request->input('key');
        $quantity = $request->input('quantity');

        // Retrieve the current cart from session
        $cart = Session::get('cart', []);

        // Check if the item exists in the cart
        if (isset($cart[$cartKey])) {
            // Update the item's quantity
            $cart[$cartKey]['quantity'] = $quantity;

            // Save the updated cart to session
            Session::put('cart', $cart);

            // Recalculate the total
            $total = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart));
            Session::put('cart_total', $total);

            return response()->json([
                'status' => 'success',
                'message' => 'Cart updated successfully!',
                'cartTotal' => $total,
                'cartItemCount' => count($cart),
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Item not found in cart.',
        ], 404);
    }

    public function checkout()
    {
        // Retrieve the cart and total from session
        $cart = Session::get('cart', []);
        $cartTotal = Session::get('cart_total', 0);

        // Check if the cart is empty
        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty. Add items before checkout.');
        }

        // Pass the cart to the checkout view
        return view('cart.checkout', compact('cart', 'cartTotal'));
    }
}
