<?php

namespace App\Http\Controllers\Admin;

use App\Models\House;
use App\Models\HouseImage;
use Illuminate\Http\Request;
use App\Models\HouseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    // Display the list of houses
    public function index()
    {
        $houses = House::with('category', 'houseImages')->get();
        return view('admin.houses.index', compact('houses'));
    }

    // Show form to create a new house
    public function create()
    {
        $categories = HouseCategory::all();
        return view('admin.houses.create', compact('categories'));
    }

    // Store a new house in the database
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|max:255|unique:houses,slug',
            'state' => 'required|string|max:255',
            'category_id' => 'required|exists:house_categories,id',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'square' => 'required|numeric',
            'bath' => 'required|integer',
            'bed' => 'required|integer',
            'original_price' => 'nullable|numeric',
            'selling_price' => 'required|numeric',
            'rating' => 'nullable|numeric|min:0|max:5',
            'trending' => 'required|boolean',
            'status' => 'required|string|in:active,inactive',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Create the new house
        $house = House::create($request->only([
            'slug',
            'state',
            'category_id',
            'address',
            'description',
            'square',
            'bath',
            'bed',
            'original_price',
            'selling_price',
            'rating',
            'trending',
            'status'
        ]));

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('uploads/houses', 'public');
                HouseImage::create([
                    'house_id' => $house->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('admin.houses.index')->with('success', 'House created successfully!');
    }

    // Show form to edit a house
    public function edit($id)
    {
        $house = House::with('houseImages')->findOrFail($id);
        $categories = HouseCategory::all();
        return view('admin.houses.edit', compact('house', 'categories'));
    }

    // Update a house in the database
    public function update(Request $request, $id)
    {
        $house = House::findOrFail($id);

        $request->validate([
            'slug' => 'required|string|max:255|unique:houses,slug,' . $house->id,
            'state' => 'required|string|max:255',
            'category_id' => 'required|exists:house_categories,id',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'square' => 'required|numeric',
            'bath' => 'required|integer',
            'bed' => 'required|integer',
            'original_price' => 'nullable|numeric',
            'selling_price' => 'required|numeric',
            'rating' => 'nullable|numeric|min:0|max:5',
            'trending' => 'required|boolean',
            'status' => 'required|string|in:active,inactive',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Update house fields
        $house->update($request->only([
            'slug',
            'state',
            'category_id',
            'address',
            'description',
            'square',
            'bath',
            'bed',
            'original_price',
            'selling_price',
            'rating',
            'trending',
            'status'
        ]));

        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('uploads/houses', 'public');
                HouseImage::create([
                    'house_id' => $house->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('admin.houses.index')->with('success', 'House updated successfully!');
    }

    // Delete a house from the database
    public function destroy($id)
    {
        $house = House::findOrFail($id);

        // Delete associated images
        foreach ($house->houseImages as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        // Delete the house itself
        $house->delete();

        return redirect()->route('admin.houses.index')->with('success', 'House deleted successfully!');
    }
}
