<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CakeController extends Controller
{
    public function create(Request $request) {
        return view('create', []);
    }
}
