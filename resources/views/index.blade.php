@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('cv.index') }}">
        @csrf

        <input type="text" id="firstName" name="firstName" value="First Name"><br><br>
        <input type="text" id="middleName" name="middleName" value="Midle Name"><br><br>
        <input type="text" id="lastName" name="lastName" value="Last Name"><br><br>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday"><br><br>

        <select name="university" id="university">
            <option value="" selected disabled>Choose university</option>   
        </select>
        <button type="button" id="addUniversityButton">Add University</button>
        <br><br>

        <select name="technology" id="technology">
            <option value="" selected disabled>Choose technology</option>
        </select>
        <button type="button" id="addTechnologyButton">Add Technology</button>
        <br><br>
        <button type="submit" value="Submit">Submit the CV</button>
    </form>
    <br>
    <button onclick="redirectToSecondPage()">Go to Second Page</button>
@endsection

