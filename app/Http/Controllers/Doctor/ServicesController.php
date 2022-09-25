<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Services::where('doctor_id', Auth::guard('doctor')->user()->id)->get();

        return view('frontend.doctor.services.index', compact('services'));
    }

    public function add(Request $request)
    {
        $service = new Services;
        $service->doctor_id = Auth::guard('doctor')->user()->id;
        $service->name = $request->service_name;
        $service->save();

        return redirect()->route('doctor.services')->with('success', 'Hizmet başarıyla oluşturuldu.');

    }

    public function edit($id)
    {
        $service = Services::where([['doctor_id', Auth::guard('doctor')->user()->id], ['id', $id]])->first();

        if (!$service) {
            return response()->json(['status' => 'error', 'data' => 'Bir Hata Oluştu']);
        }

        return response()->json(['status' => 'success', 'data' => $service]);

    }

    public function update(Request $request)
    {
        $service = Services::where([['doctor_id', Auth::guard('doctor')->user()->id], ['id', $request->service_id]])->first();

        if (!$service) {
            return redirect()->back()->withErrors('Bir Hata Oluştu');
        }

        $service->name = $request->service_name;
        $service->save();

        return redirect()->back()->with('success', 'Servis bilgileri güncellendi');
    }

    public function delete($id)
    {
        $service = Services::where([['doctor_id', Auth::guard('doctor')->user()->id], ['id', $id]])->first();
        if (!$service){
            return redirect()->back()->withErrors('Bir Hata Oluştu');

        }

        $service->delete();

        return redirect()->back()->with('success', 'Servis bilgileri silindi');

    }

}
