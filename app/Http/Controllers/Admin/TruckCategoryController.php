<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TruckCategory;
use App\Http\Controllers\Controller;

class TruckCategoryController extends Controller
{
    // Display a list of all categories
    public function index()
    {
        $categories = TruckCategory::all(); // Get all categories
        return view('admin.trucks.categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        return view('admin.trucks.categories.create');
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
        TruckCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect to the categories list with a success message
        return redirect()->route('admin.trucks.categories.index')->with('message', 'Category added successfully.');
    }

    // Show the form to edit an existing category
    public function edit($id)
    {
        $category = TruckCategory::findOrFail($id); // Find category by ID
        return view('admin.trucks.categories.edit', compact('category'));
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
        $category = TruckCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect to the categories list with a success message
        return redirect()->route('admin.trucks.categories.index')->with('message', 'Category updated successfully.');
    }

    // Delete the specified category
    public function destroy($id)
    {
        $category = TruckCategory::findOrFail($id);
        $category->delete(); // Delete the category

        // Redirect to the categories list with a success message
        return redirect()->route('admin.trucks.categories.index')->with('message', 'Category deleted successfully.');
    }
}
