<?php

namespace App\Http\Controllers\Home;

use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    public function houses(Request $request)
    {
        // Get sorting option
        $sort = $request->input('sort', 'relevance');

        // Sort the Houses based on the selected option
        switch ($sort) {
            case 'name_asc':
                $houses = House::orderBy('name', 'asc')->paginate(9);
                break;
            case 'name_desc':
                $houses = House::orderBy('name', 'desc')->paginate(9);
                break;
            case 'price_asc':
                $houses = House::orderBy('price', 'asc')->paginate(9);
                break;
            case 'price_desc':
                $houses = House::orderBy('price', 'desc')->paginate(9);
                break;
            case 'model_asc':
                $houses = House::orderBy('model', 'asc')->paginate(9);
                break;
            case 'model_desc':
                $houses = House::orderBy('model', 'desc')->paginate(9);
                break;
            default:
                $houses = House::paginate(9); // Default relevance sorting
        }

        return view('houses.index', compact('houses', 'sort'));
    }


    public function viewHouses($id)
    {
        $house = House::with('category')->findOrFail($id);
        return view('houses.view', compact('House'));
    }
}
