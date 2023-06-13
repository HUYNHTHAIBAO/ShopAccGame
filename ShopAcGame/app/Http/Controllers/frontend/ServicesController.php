<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //
    public function index() {
        // lấy slider
        $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('frontend.services.index', compact('slider'));
    }
}
