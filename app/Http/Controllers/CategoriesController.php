<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function forexPage()
    {

        return view('categories.forex');
    }

    public function bankingPage()
    {

        return view('categories.banking');
    }
}
