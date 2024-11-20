<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Category;
use App\Models\CarCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    // Display a listing of cars
    public function index()
    {
        $cars = Car::with('category')->paginate(10); // Fetch cars with their category and paginate results
        return view('admin.cars.index', compact('cars'));
    }


    public function adminViewCars()
    {
        $cars = Car::with('category')->paginate(10); // Fetch cars with their category and paginate results
        return view('admin.cars.view', compact('cars'));
    }

    // Show the form for creating a new car
    public function create()
    {
        $categories = CarCategory::all(); // Fetch categories for selection
        return view('admin.cars.create', compact('categories'));
    }

    // Store a newly created car in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:car_categories,id',
            'price' => 'required|numeric',
            'year' => 'required|integer',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $carData = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/cars/', $filename);
            $carData['image'] = 'uploads/cars/' . $filename;
        }

        Car::create($carData); // Create a new car record

        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully.');
    }

    // Show the form for editing a specific car
    public function edit(Car $car)
    {
        $categories =  CarCategory::all(); // Fetch categories for selection
        return view('admin.cars.edit', compact('car', 'categories'));
    }

    // Update a specific car in storage
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:car_categories,id',
            'price' => 'required|numeric',
            'year' => 'required|integer',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $carData = $request->all();

        // Handle image upload if a new file is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/cars/', $filename);
            $carData['image'] = 'uploads/cars/' . $filename;
        }

        $car->update($carData); // Update car record

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    // Remove a specific car from storage
    public function destroy(Car $car)
    {
        if ($car->image && file_exists(public_path($car->image))) {
            unlink(public_path($car->image)); // Delete image from storage
        }

        $car->delete(); // Delete the car record

        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }
}
