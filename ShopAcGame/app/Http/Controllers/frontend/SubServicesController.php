<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubServicesController extends Controller
{
    //
    public function index($slug) {
        return view('frontend.sub_services.index', compact('slug'));
    }
}
