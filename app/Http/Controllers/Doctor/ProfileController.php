<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileSettingsRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\City;
use App\Models\Departments;
use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorDetail;
use App\Models\DoctorWorkHour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $doctor = Doctor::where('id', Auth::guard('doctor')->user()->id)->with('city', 'district', 'departments')->first();

        return view('frontend.doctor.dashboard', compact('doctor'));
    }

    public function settings()
    {
        $doctor = Doctor::where('id', Auth::guard('doctor')->user()->id)->with('city', 'district', 'departments', 'details')->first();
        $departments = Departments::get();
        $citys = City::get();
        $districts = District::where('city_id', $doctor->city_id)->get();


        return view('frontend.doctor.profile.index', compact('doctor', 'departments', 'citys', 'districts'));
    }

    public function settingsSave(ProfileSettingsRequest $request)
    {
        try {
            $doctor = Doctor::where('id', Auth::guard('doctor')->user()->id)->first();
            $detail = DoctorDetail::where('doctor_id', Auth::guard('doctor')->user()->id)->first();
            if (!$detail) {
                $detail = new DoctorDetail();
            }

            $image_path = public_path() . '/uploads/images/' . $doctor->id . '/' . $doctor->id;
            $fileName = "";

            if ($request->has('file') && $request->file != null) {
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $file = $request->file('file');
                $fileName = 'uploads/images/' . $doctor->id . '/' . $doctor->id . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path() . '/uploads/images/' . $doctor->id;
                $file->move($destinationPath, $fileName);
                $doctor->image = $fileName;

            }

            $doctor->department_id = $request->department;
            $doctor->city_id = $request->city;
            $doctor->district_id = $request->discricts;
            $doctor->email = $request->email;
            $doctor->name = $request->name;
            $doctor->phone_number = $request->phone_number;
            $doctor->save();

            $detail->doctor_id = Auth::guard('doctor')->user()->id;
            $detail->company_name = $request->company_name;
            $detail->company_adress = $request->company_adress;
            $detail->about = $request->about;
            $detail->description = $request->description;
            $detail->avarage_price = $request->avarage_price;
            $detail->save();


        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Bir hata oluştu lütfen daha sonra tekra deneyiniz.' . json_encode($e));
        }


        return redirect()->back()->with('success', 'Profil bilgileri güncellendi.');

    }

    public function workHours()
    {
        $hours = array();
        $doctor = Doctor::where('id', Auth::guard('doctor')->user()->id)->with('city', 'district', 'departments')->first();
        $hours = DoctorWorkHour::where('doctor_id', Auth::guard('doctor')->user()->id)->get();

        return view('frontend.doctor.workhours', compact('hours', 'doctor'));
    }

    public function workHoursSave(Request $request)
    {

        $workHour = DoctorWorkHour::where('doctor_id', Auth::guard('doctor')->user()->id)->get();

        for ($i = 0; $i <= 6; $i++) {
            DoctorWorkHour::where('doctor_id', Auth::guard('doctor')->user()->id)
                ->where('day', ($i + 1))
                ->update([
                    'hour_start' => $request->startDate[$i],
                    'hour_end' => $request->endDate[$i],
                    'is_closed' => ($request->closed[$i]),
                ]);
        }

        return redirect()->back()->with('success', 'Mesai Saatleri Güncellendi');
    }

    public function password()
    {
        return view('frontend.doctor.profile.password');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $user = Doctor::where('id', Auth::guard('doctor')->user()->id)->first();
        $hashedPassword = Auth::guard('doctor')->user()->password;

        if (!$user) {
            return redirect()->back()->withErrors('Bir Hata Oluştu');;
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors('Eski Şifreniz Hatalı');;
        }

        if ($request->new_password != $request->new_password_reply) {
            return redirect()->back()->withErrors('Yeni Şifre Tekrarı Aynı Değil');;
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Şifre Bilgileriniz Güncellendi.');
    }


}
