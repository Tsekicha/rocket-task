<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\University;

class NewItemController extends Controller
{
    public function addTechnology(Request $request)
    {
        $technologyName = $request->input('technology');

        $technology = Technology::create(['name' => $technologyName]);
      

        return response()->json(['id' => $technology->id, 'name' => $technology->name]);
    }

    public function addUniversity(Request $request)
    {
        $universityName = $request->input('university');

        $university = University::create(['name' => $universityName]);

        return response()->json(['id' => $university->id, 'name' => $university->name]);
    }
}