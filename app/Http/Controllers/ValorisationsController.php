<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValorisationsController extends Controller
{
    public function index()
    {
        return view('pages.valorisations');
    }
}

