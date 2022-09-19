<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\City;
use App\Models\Departments;
use App\Models\District;
use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['departments', 'city', 'district'])->orderBy('licance_end', 'asc')->get();

        $city = City::get();
        $departments = Departments::get();
        return view('admin.pages.doctors.index', compact('doctors', 'city', 'departments'));
    }

    public function create(DoctorRequest $request)
    {

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        Doctor::create($data);

        return response()->json(['status' => 'success', 'data' => 'Yeni Doktor Kaydedildi']);

    }

    public function getDistrict($city)
    {
        $district = District::where('city_id', $city)->get();

        if (!$district) {
            return response()->json(['status' => 'error', 'data' => 'Bir Hata Oluştu']);
        }

        return response()->json(['status' => 'success', 'data' => $district]);
    }

    public function delete($id)
    {
        $doctor = Doctor::where('id', $id)->delete();
        if (!$doctor) {
            return redirect()->route('admin.doctors')->withErrors('Bir Hata Oluştu Lütfen Tekrar Deneyiniz.');
        }
        return redirect()->route('admin.doctors')->with('success', 'Doktor silindi');

    }

    public function edit($id)
    {
        $doctor = Doctor::where('id', $id)->first();
        if (!$doctor) {
            return redirect()->route('admin.doctors')->withErrors('Doktor bilgileri bulunamadı lütfen sayfayı yenileyip tekrar deneyiniz');
        }
        $city = City::get();
        $districts = District::where('city_id', $doctor->city_id)->get();
        $departments = Departments::get();

        return view('admin.pages.doctors.edit', compact('doctor', 'city', 'departments', 'districts'));
    }

    public function update(Request $request, $id)
    {

        $doctor = Doctor::where('id', $id)->first();
        if (!$doctor) {
            return redirect()->route('admin.doctors')->withErrors('Bir Hata Oluştu');
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

        }

        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone_number = $request->phone_number;
        $doctor->city_id = $request->city_id;
        $doctor->district_id = $request->district_id;
        $doctor->licance_start = $request->licance_start;
        $doctor->licance_end = $request->licance_end;
        $doctor->image = $fileName;
        if (isset($request->status)) {
            $doctor->status = 1;
        } else {
            $doctor->status = 0;

        }
        if (isset($request->password) && $request->password != null && $request->password != '') {
            $doctor->password = bcrypt($request->password);
        }

        $doctor->save();

        return redirect()->route('admin.doctors')->with('success', $doctor->name . 'İsimli doktorun bilgileri güncellendi');

    }

    public function licanceEnd()
    {
        $doctors = Doctor::with(['departments', 'city', 'district'])->where('licance_end', '<', Carbon::now())->orderBy('licance_end', 'asc')->get();

        $city = City::get();
        $departments = Departments::get();
        return view('admin.pages.doctors.licanceEnd', compact('doctors', 'city', 'departments'));
    }

    public function licanceUpdate(Request $request)
    {
        $doctor = Doctor::where('id', $request->doctor_id)->first();
        if (!$doctor) {
            return redirect()->back()->withErrors('Bir Hata Oluştu Daha Sonra Tekrar Deneyiniz.');
        }

        $doctor->licance_end = $request->licance_end;
        $doctor->status = 1;
        $doctor->save();

        return redirect()->back()->with('success', $doctor->name . ' İsimli doktorun lisans bitiş tarihi güncellendi.');
    }

    public function waitDoctor()
    {
        $doctors = Doctor::with(['departments', 'city', 'district'])->where('status', 0)->get();

        return view('admin.pages.doctors.wait', compact('doctors'));
    }

    public function approveDoctor($id)
    {
        $doctor = Doctor::where('id', $id)->first();
        $doctor->status = 1;
        $doctor->licance_start = Carbon::now();
        $doctor->licance_end = Carbon::now()->addYear();
        $doctor->save();
        return redirect()->back()->with('success', $doctor->name . ' İsimli doktor 1 yıllığına lisansı aktif edildi');

    }

    public function standUp($type, $id)
    {
        $doctor = Doctor::where('id', $id)->first();
        $message = "";
        if (!$doctor) {
            return redirect()->back()->withErrors('Bir hata oluştu daha sonra tekrar deneyiniz.');
        }

        if ($type == "remove") {
            $doctor->best = 0;
            $message = ' İsimli doktor artık öne çıkanlarda görünmeyecek';
        } else {
            $doctor->best = 1;
            $message = ' İsimli doktor artık öne çıkanlarda görünecek';
        }

        $doctor->save();

        return redirect()->back()->with('success', $doctor->name . $message);
    }
}
