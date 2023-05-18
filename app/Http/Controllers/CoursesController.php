<?php

namespace App\Http\Controllers;
use App\Models\courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function coursesList()
    {
        $courses = courses::all();

        return view('courses', compact('courses'));
    }
}
