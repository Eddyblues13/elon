<?php

namespace App\Http\Controllers\Home;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function cars(Request $request)
    {
        // Get sorting option
        $sort = $request->input('sort', 'relevance');

        // Sort the cars based on the selected option
        switch ($sort) {
            case 'name_asc':
                $cars = Car::orderBy('name', 'asc')->paginate(9);
                break;
            case 'name_desc':
                $cars = Car::orderBy('name', 'desc')->paginate(9);
                break;
            case 'price_asc':
                $cars = Car::orderBy('price', 'asc')->paginate(9);
                break;
            case 'price_desc':
                $cars = Car::orderBy('price', 'desc')->paginate(9);
                break;
            case 'model_asc':
                $cars = Car::orderBy('model', 'asc')->paginate(9);
                break;
            case 'model_desc':
                $cars = Car::orderBy('model', 'desc')->paginate(9);
                break;
            default:
                $cars = Car::paginate(9); // Default relevance sorting
        }

        return view('cars.index', compact('cars', 'sort'));
    }


    public function viewCars($id)
    {
        $car = Car::with('category')->findOrFail($id);
        return view('cars.view', compact('car'));
    }
}
