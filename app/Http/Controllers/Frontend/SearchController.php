<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {

    }

    public function doctorProfile($id)
    {
        $doctor = Doctor::where('id', $id)->first();

        return view('frontend.home.doctor_profile', compact('doctor'));
    }
}
