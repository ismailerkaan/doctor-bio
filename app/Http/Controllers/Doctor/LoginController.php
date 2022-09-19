<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\City;
use App\Models\Departments;
use App\Models\Doctor;
use App\Models\DoctorDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('frontend.doctor.login');
    }

    public function login(LoginRequest $request)
    {

        $authDetails = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if (Auth::guard('doctor')->attempt($authDetails, $request->exists('remember'))) {

            if (Auth::guard('doctor')->user()->licance_end < Carbon::now()) {
                Auth::guard('doctor')->logout();
                return redirect()->back()->withErrors('Lisans süreniz bittiği için giriş izniniz bulunmamaktadır.');
            }
            if (Auth::guard('doctor')->user()->status == 0) {
                Auth::guard('doctor')->logout();
                return redirect()->back()->withErrors('Şuanda giriş izniniz bulunmamaktadır..');
            }
            return redirect()->route('doctor.dashboard');
        }

        return redirect()->route('doctor.login.page')->withErrors(['E-posta yada Parola Hatalı']);
    }

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();

        return redirect()->route('doctor.login.page');
    }

    public function register()
    {
        $city = City::get();
        $departmans = Departments::get();
        return view('frontend.doctor.register', compact('city', 'departmans'));
    }

    public function registerDoctor(DoctorRegisterRequest $request)
    {
        $doctor = new Doctor();

        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone_number = $request->phone_number;
        $doctor->department_id = $request->department_id;
        $doctor->city_id = $request->city_id;
        $doctor->district_id = $request->district_id;
        $doctor->password = bcrypt($request->password);
        $doctor->status = 0;
        $doctor->save();
        if (!$doctor) {

            return redirect()->back()->withErrors('Kayıt sürecinde bir hata oluştu. Lütfen daha sonra tekrar deneyiniz.');

        }
        $detail = new DoctorDetail();
        $detail->doctor_id = $doctor->id;
        $detail->company_name = $request->company_name;
        $detail->company_adress = $request->company_address;
        $detail->save();
        return redirect()->route('doctor.login.page')->with('success','Kaydınız başarıyla alınmıştır. Hesabınız onaylandıktan sonra sisteme giriş yapabilirsiniz.');


    }

}
