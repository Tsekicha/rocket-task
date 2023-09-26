<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CV;
use App\Models\CV_User;
use App\Models\Technology;
use App\Models\University;


class CVController extends Controller
{
    public function create()
    {
        return view('index');
    }
    public function showSecondPage()
    {
        return view('second_page');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'birthday' => 'nullable|date'
        ]);

        $user = CV_User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'middleName' => $data['middleName'],
            'birthday' => $data['birthday'],
        ]);

        $technologyName = $request->input('technology');
        $universityName = $request->input('university');
      

        $technologyId = Technology::where('id', $technologyName)->pluck('id')->first();
        $universityId = University::where('id', $universityName)->pluck('id')->first();
        

        $cv = CV::create([
            'user_id' => $user->id,
            'technology_id' => $technologyId,
            'university_id' => $universityId,
        ]);
    }

    public function fetchCVData(Request $request)
    {
        
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $cvData = CV_User::whereBetween('birthday', [$startDate, $endDate])
                ->select('firstName', 'middleName', 'lastName', 'birthday')
                ->get();

        return response()->json(['cvData' => $cvData]);
    }
}