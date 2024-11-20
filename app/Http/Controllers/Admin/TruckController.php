<?php

namespace App\Http\Controllers\Admin;

use App\Models\Truck;
use Illuminate\Http\Request;
use App\Models\TruckCategory;
use App\Http\Controllers\Controller;

class TruckController extends Controller
{
    // Display a listing of trucks
    public function index()
    {
        $trucks = Truck::with('category')->paginate(10); // Fetch trucks with their category and paginate results
        return view('admin.trucks.index', compact('trucks'));
    }


    public function viewTrucks()
    {
        $trucks = Truck::with('category')->paginate(10); // Fetch trucks with their category and paginate results
        return view('admin.trucks.view', compact('trucks'));
    }

    // Show the form for creating a new truck
    public function create()
    {
        $categories = TruckCategory::all(); // Fetch categories for selection
        return view('admin.trucks.create', compact('categories'));
    }

    // Store a newly created truck in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:truck_categories,id',
            'price' => 'required|numeric',
            'year' => 'required|integer',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $truckData = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/trucks/', $filename);
            $truckData['image'] = 'uploads/trucks/' . $filename;
        }

        Truck::create($truckData); // Create a new truck record

        return redirect()->route('admin.trucks.index')->with('success', 'truck added successfully.');
    }

    // Show the form for editing a specific truck
    public function edit(Truck $truck)
    {
        $categories =  TruckCategory::all(); // Fetch categories for selection
        return view('admin.trucks.edit', compact('truck', 'categories'));
    }

    // Update a specific truck in storage
    public function update(Request $request, Truck $truck)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:truck_categories,id',
            'price' => 'required|numeric',
            'year' => 'required|integer',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $truckData = $request->all();

        // Handle image upload if a new file is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/trucks/', $filename);
            $truckData['image'] = 'uploads/trucks/' . $filename;
        }

        $truck->update($truckData); // Update truck record

        return redirect()->route('admin.trucks.index')->with('success', 'truck updated successfully.');
    }

    // Remove a specific truck from storage
    public function destroy(Truck $truck)
    {
        if ($truck->image && file_exists(public_path($truck->image))) {
            unlink(public_path($truck->image)); // Delete image from storage
        }

        $truck->delete(); // Delete the truck record

        return redirect()->route('admin.trucks.index')->with('success', 'truck deleted successfully.');
    }
}
