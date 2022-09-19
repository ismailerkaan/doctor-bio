<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('doctor_id', Auth::guard('doctor')->user()->id)->with('doctor')->get();
        return view('frontend.doctor.blog.index', compact('blogs'));
    }


    public function create()
    {
        return view('frontend.doctor.blog.create');
    }

    public function add(BlogRequest $request)
    {
        $fileName = "";
        $data = $request->all();
        $data['doctor_id'] = Auth::guard('doctor')->user()->id;
        $data['status'] = 2;

        $blog = Blog::create($data);

        if ($request->has('file') && $request->file != null) {

            $file = $request->file('file');
            $fileName = 'uploads/images/' . Auth::guard('doctor')->user()->id . '/blog/' . $blog->id . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/uploads/images/' . Auth::guard('doctor')->user()->id . '/blog/';
            $file->move($destinationPath, $fileName);

        }
        $blog->image = $fileName;
        $blog->save();

        return redirect()->route('doctor.blog.index')->with('success', 'Blog başarıyla oluşturuldu admin onayından geçtikten sonra yayınlanacaktır.');
    }

    public function edit($id)
    {
        $blog = Blog::where(['id' => $id, 'doctor_id' => Auth::guard('doctor')->user()->id])->first();

        if (!$blog) {
            return redirect()->back()->withErrors('Blog Bulunamadı Sayfay yeniğleyip tekrar deneyiniz.');
        }

        return view('frontend.doctor.blog.edit', compact('blog'));
    }

    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::where(['id' => $id, 'doctor_id' => Auth::guard('doctor')->user()->id])->first();

        if (!$blog) {
            return redirect()->back()->withErrors('Blog Bulunamadı Sayfayı yenileyip tekrar deneyiniz.');
        }

        $image_path = public_path() . '/uploads/images/' . Auth::guard('doctor')->user()->id . '/blog/' . $blog->id;
        $fileName = "";


        if ($request->has('file') && $request->file != null) {
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('file');
            $fileName = 'uploads/images/' . Auth::guard('doctor')->user()->id . '/blog/' . $blog->id . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/uploads/images/' . Auth::guard('doctor')->user()->id . '/blog/';
            $file->move($destinationPath, $fileName);

            $blog->image = $fileName;
        }

        $blog->header = $request->header;
        $blog->content = $request->content;
        if ($blog->status != 2) {
            $blog->status = $request->status;
        }
        $blog->save();

        return redirect()->back()->with('success', 'Blog detayları güncellendi');


    }

    public function delete($id)
    {
        $blog = Blog::where(['id' => $id, 'doctor_id' => Auth::guard('doctor')->user()->id])->first();

        if (!$blog) {
            return redirect()->back()->withErrors('Blog Bulunamadı Sayfayı yenileyip tekrar deneyiniz.');
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Blog silindi');

    }
}
