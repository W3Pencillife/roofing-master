<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function residential()
    {
        return view('admin.residentialprojects');
    }

    public function commercial()
    {
        return view('admin.commercialprojects');
    }
}
