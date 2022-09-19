<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Services::where('doctor_id', Auth::user()->id)->get();

        return view('frontend.doctor.services.index', compact('services'));
    }

}
