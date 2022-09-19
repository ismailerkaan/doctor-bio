<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmansController extends Controller
{
    public function index()
    {
        $departments = Departments::get();

        return view('admin.pages.departments.index', compact('departments'));
    }

    public function create(Request $request)
    {
        $department = new Departments();
        $department->name = $request->name;
        $department->save();

        return redirect()->back()->with('success', 'Yeni Bölüm Eklendi.');
    }

    public function edit($id)
    {
        $department = Departments::where('id', $id)->first();

        if (!$department) {
            return response()->json(['status' => 'error', 'data' => '']);
        }

        return response()->json(['status' => 'success', 'data' => $department]);
    }

    public function update(Request $request)
    {
        $department = Departments::where('id', $request->id)->first();
        $oldName = $department->name;
        if (!$department) {
            return redirect()->back()->withErrors('Bir hata oluştu lütfen daha sonra tekrar deneyiniz.');
        }

        $department->name = $request->name;
        $department->save();

        return redirect()->back()->with('success', $oldName . ' adlı bölüm adı ' . $department->name . ' olarak değiştirildi.');

    }

    public function delete($id)
    {
        $department = Departments::where('id', $id)->first();
        $oldName = $department->name;

        if (!$department) {
            return redirect()->back()->withErrors('Bir hata oluştu lütfen daha sonra tekrar deneyiniz.');
        }

        $department->delete();

        return redirect()->back()->with('success', $oldName . ' adlı bölüm silindi.');

    }
}
