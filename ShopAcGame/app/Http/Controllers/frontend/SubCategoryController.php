<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function index($slug) {
        return view('frontend.sub_category.index', compact('slug'));
    }
}
