<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function index($slug) {
        // lấy slider
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('frontend.sub_category.index', compact('slug', 'slider'));
    }
}
