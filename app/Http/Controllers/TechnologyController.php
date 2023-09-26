<?php

namespace App\Http\Controllers;

use App\Models\Technology;

class TechnologyController extends Controller
{
    public function getTechnologyOptions()
    {
        $technologies = Technology::all();
        return response()->json($technologies);
    }
}