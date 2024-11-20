<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarCategoryController extends Controller
{
    // Display a list of all categories
    public function index()
    {
        $categories = CarCategory::all(); // Get all categories
        return view('admin.cars.categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        return view('admin.cars.categories.create');
    }

    // Store a newly created category
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new category
        CarCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect to the categories list with a success message
        return redirect()->route('admin.cars.categories.index')->with('message', 'Category added successfully.');
    }

    // Show the form to edit an existing category
    public function edit($id)
    {
        $category = CarCategory::findOrFail($id); // Find category by ID
        return view('admin.cars.categories.edit', compact('category'));
    }

    // Update the specified category
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Find and update the category
        $category = CarCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect to the categories list with a success message
        return redirect()->route('admin.cars.categories.index')->with('message', 'Category updated successfully.');
    }

    // Delete the specified category
    public function destroy($id)
    {
        $category = CarCategory::findOrFail($id);
        $category->delete(); // Delete the category

        // Redirect to the categories list with a success message
        return redirect()->route('admin.cars.categories.index')->with('message', 'Category deleted successfully.');
    }
}
