<?php

namespace App\Http\Controllers\Home;

use App\Models\Truck;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TruckController extends Controller
{
    public function trucks(Request $request)
    {
        // Get sorting option
        $sort = $request->input('sort', 'relevance');

        // Sort the Trucks based on the selected option
        switch ($sort) {
            case 'name_asc':
                $trucks = Truck::orderBy('name', 'asc')->paginate(9);
                break;
            case 'name_desc':
                $trucks = Truck::orderBy('name', 'desc')->paginate(9);
                break;
            case 'price_asc':
                $trucks = Truck::orderBy('price', 'asc')->paginate(9);
                break;
            case 'price_desc':
                $trucks = Truck::orderBy('price', 'desc')->paginate(9);
                break;
            case 'model_asc':
                $trucks = Truck::orderBy('model', 'asc')->paginate(9);
                break;
            case 'model_desc':
                $trucks = Truck::orderBy('model', 'desc')->paginate(9);
                break;
            default:
                $trucks = Truck::paginate(9); // Default relevance sorting
        }

        return view('trucks.index', compact('trucks', 'sort'));
    }


    public function viewTrucks($id)
    {
        $Truck = Truck::with('category')->findOrFail($id);
        return view('trucks.view', compact('truck'));
    }
}
