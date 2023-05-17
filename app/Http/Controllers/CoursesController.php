<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function coursesList()
    {
        $courses = \App\Models\courses::all();

        return view('courses', compact('courses'));
    }
}
