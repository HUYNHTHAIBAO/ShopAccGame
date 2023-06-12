<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('frontend.home.index', compact('category'));
    }
}
