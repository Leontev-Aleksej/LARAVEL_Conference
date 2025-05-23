<?php

namespace App\Http\Controllers;

use App\Models\Report;

class HomeController extends Controller
{
    public function index()
    {
        $reports = Report::where('status', 'approved')->with('section')->get();
        return view('home', compact('reports'));
    }
}
