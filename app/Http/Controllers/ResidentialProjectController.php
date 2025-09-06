<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidentialProject;


class ResidentialProjectController extends Controller
{
    public function index()
    {
        $residentialProject = ResidentialProject::first(); // or latest()
        return view('residential-project', compact('residentialProject'));
    }
}

