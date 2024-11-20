<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appliance;
use Illuminate\Http\Request;
use App\Models\ApplianceCategory;
use App\Http\Controllers\Controller;

class ApplianceController extends Controller
{
    // Display a listing of appliances
    public function index()
    {
        $appliances = Appliance::with('category')->paginate(10); // Fetch appliances with their category and paginate results
        return view('admin.appliances.index', compact('appliances'));
    }


    public function viewappliances()
    {
        $appliances = Appliance::with('category')->paginate(10); // Fetch appliances with their category and paginate results
        return view('admin.appliances.view', compact('appliances'));
    }

    // Show the form for creating a new appliance
    public function create()
    {
        $categories = ApplianceCategory::all(); // Fetch categories for selection
        return view('admin.appliances.create', compact('categories'));
    }

    // Store a newly created appliance in storage
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:appliance_categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $applianceData = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/appliances/', $filename);
            $applianceData['image'] = 'uploads/appliances/' . $filename;
        }

        Appliance::create($applianceData); // Create a new appliance record

        return redirect()->route('admin.appliances.index')->with('success', 'Appliance added successfully.');
    }

    // Show the form for editing a specific appliance
    public function edit(Appliance $appliance)
    {
        $categories =  ApplianceCategory::all(); // Fetch categories for selection
        return view('admin.appliances.edit', compact('appliance', 'categories'));
    }

    // Update a specific appliance in storage
    public function update(Request $request, Appliance $appliance)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:appliance_categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $applianceData = $request->all();

        // Handle image upload if a new file is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/appliances/', $filename);
            $applianceData['image'] = 'uploads/appliances/' . $filename;
        }

        $appliance->update($applianceData); // Update appliance record

        return redirect()->route('admin.appliances.index')->with('success', 'appliance updated successfully.');
    }

    // Remove a specific appliance from storage
    public function destroy(Appliance $appliance)
    {
        if ($appliance->image && file_exists(public_path($appliance->image))) {
            unlink(public_path($appliance->image)); // Delete image from storage
        }

        $appliance->delete(); // Delete the appliance record

        return redirect()->route('admin.appliances.index')->with('success', 'Appliance deleted successfully.');
    }
}
