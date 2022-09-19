<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Departments;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $postData = array();

        $blogs = Blog::with('doctor');

        if (isset($request->doctor_name) && $request->doctor_name != "") {
            $blogs = $blogs->whereHas('doctor', function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->doctor_name . '%');
            });
            $postData['doctor_name'] = $request->doctor_name;
        }

        if (isset($request->department_id) && $request->department_id != "") {
            $blogs = $blogs->whereHas('doctor', function ($query) use ($request) {
                return $query->where('department_id', '=', $request->department_id);
            });
            $postData['department_id'] = $request->department_id;
        }

        if (isset($request->status) && $request->status != "") {
            $blogs = $blogs->where('status', $request->status);
            $postData['status'] = $request->status;
        }

        $blogs = $blogs->paginate(10);
        $departments = Departments::get();


        return view('admin.pages.blog.index', compact('blogs', 'departments', 'postData'));
    }

    public function review($id)
    {
        $blog = Blog::where('id', $id)->first();

        return view('admin.pages.blog.review', compact('blog'));
    }

    public function status(Request $request)
    {
        $blog = Blog::where('id', $request->blog_id)->first();
        if (!$blog) {
            return redirect()->back()->withErrors('Bir hata oluştu daha sonra tekrar deneyiniz.');
        }
        $blog->status = $request->status;
        $blog->save();
        return redirect()->back()->with('success', 'Blog Durumu Güncellendi');

    }

    public function wait()
    {
        $blogs = Blog::where('status', 2)->paginate(9);

        return view('admin.pages.blog.wait', compact('blogs'));
    }

    public function accept($type, $id)
    {
        $blog = Blog::where('id', $id)->first();

        if (!$blog) {
            return redirect()->back()->withErrors('Bir hata oluştu daha sonra tekrar deneyiniz.');
        }

        if ($type == "notAccept") {
            $blog->status = 3;
        } else {
            $blog->status = 1;
        }

        $blog->save();

        return redirect()->back()->with('success', 'Blog Durumu Güncellendi');
    }
}
