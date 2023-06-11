<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeComtroller extends Controller
{
    //
    public function index() {
        return view('backend.home.index');
    }
}
