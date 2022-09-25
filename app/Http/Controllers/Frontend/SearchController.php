<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Departments;
use App\Models\District;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Doctor::query()->where('status', '=', 1);
        $city = City::get();
        $district = [];
        $department = Departments::get();
        $filterData = array(
            'city' => null,
            'district' => null,
            'department' => null,
        );

        if ($request->get('city')) {
            $filterData['city'] = $request->get('city');
            $district = District::where('city_id', $request->get('city'))->get();
            $query->where('city_id', $request->get('city'));
        }
        if ($request->get('district')) {
            $filterData['district'] = $request->get('district');
            $query->where('district_id', $request->get('district'));
        }
        if ($request->get('department')) {
            $filterData['department'] = $request->get('department');
            $query->where('department_id', $request->get('department'));
        }

        $doctors = $query->paginate('1');

        return view('frontend.home.search', compact('doctors', 'city', 'district', 'department', 'filterData'));
    }

    public function doctorProfile($id)
    {
        $doctor = Doctor::where('id', $id)->first();


        $days = array(
            1 => 'Pazartesi',
            2 => 'Salı',
            3 => 'Çarşamba',
            4 => 'Perşembe',
            5 => 'Cuma',
            6 => 'Cumartesi',
            7 => 'Pazar'
        );
        return view('frontend.home.doctor_profile', compact('doctor', 'days'));
    }
}
