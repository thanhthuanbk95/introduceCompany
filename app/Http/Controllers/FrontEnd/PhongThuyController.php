<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhongThuyController extends Controller
{
    public function index()
    {
        return view('frontend.phongthuy');
    }
}
