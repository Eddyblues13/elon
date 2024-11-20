<?php

namespace App\Http\Controllers\Home;

use App\Models\Appliance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplianceController extends Controller
{
    public function appliances(Request $request)
    {
        // Get sorting option
        $sort = $request->input('sort', 'relevance');

        // Sort the Appliances based on the selected option
        switch ($sort) {
            case 'name_asc':
                $appliances = Appliance::orderBy('name', 'asc')->paginate(9);
                break;
            case 'name_desc':
                $appliances = Appliance::orderBy('name', 'desc')->paginate(9);
                break;
            case 'price_asc':
                $appliances = Appliance::orderBy('price', 'asc')->paginate(9);
                break;
            case 'price_desc':
                $appliances = Appliance::orderBy('price', 'desc')->paginate(9);
                break;
            case 'model_asc':
                $appliances = Appliance::orderBy('model', 'asc')->paginate(9);
                break;
            case 'model_desc':
                $appliances = Appliance::orderBy('model', 'desc')->paginate(9);
                break;
            default:
                $appliances = Appliance::paginate(9); // Default relevance sorting
        }

        return view('appliances.index', compact('appliances', 'sort'));
    }


    public function viewAppliances($id)
    {
        $appliance = Appliance::with('category')->findOrFail($id);
        return view('appliances.view', compact('appliance'));
    }
}
