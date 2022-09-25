<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Departments;
use App\Models\Doctor;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $citys = City::get();
        $departments = Departments::get();
        $doctors = Doctor::where('best', 1)->take(5)->get();

        return view('frontend.homepage', compact('citys', 'departments', 'doctors'));
    }
}
