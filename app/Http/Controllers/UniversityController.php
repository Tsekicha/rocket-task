<?php

namespace App\Http\Controllers;

use App\Models\University;

class UniversityController extends Controller
{
    public function getUniversityOptions()
    {
        $technologies = University::all();
        return response()->json($technologies);
    }
}