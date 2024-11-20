<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pageController extends Controller
{
    public function index()
    {
        $data['users'] = User::get();
        return view('admin.forex.index', $data);
    }
}
