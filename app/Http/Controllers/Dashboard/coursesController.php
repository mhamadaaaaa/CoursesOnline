<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\courses;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $courses = courses::all();
        return view('course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$parant= courses::all();
        $user= User::all();
        $category = category::all();
        $courses = new courses();
        return view('course.create',compact('courses','category','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->post('name')),
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public'
            ]);
            // dd($path);
            $data['image'] = $path;
        }
        $courses = courses::create($data);
        return redirect("course")->with('success', 'courses created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $courses = courses::findOrfail($id);
        } catch (Exception $e) {
            return redirect("courses")->with('info', 'objext not found');
        }

        //get بترجع collection ,,,firest ما بترجع collection بترجع ال object نفسه تبع model

        //    ->dd();
        return view('course.edit', compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $courses = courses::find($id);
        $old_image = $courses->image;
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public'
            ]);
            $data['image'] = $path;
        }
        // $courses->update($request->all());
        $courses->update($data);
        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }
        // $courses = courses::update($request->all);
        return redirect("courses")->with('success', 'courses updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $courses = courses::find($id);
        $courses->delete();
        return redirect("course")->with('success', 'courses deleated');
    }
    public function trash()
    {
        $courses = courses::onlyTrashed()->paginate(4);
        return view('course.trash', compact('courses'));
    }
    public function restore(Request $request, $id)
    {
        $courses = courses::onlyTrashed()->findOrfail($id);
        $courses->restore();
        return redirect()->route("course.trash")->with('success', 'courses restored');
    }
    public function forcedeleate($id)
    {
        $courses = courses::onlyTrashed()->findOrFail($id);
        $courses->forceDelete();
        return redirect()->route("course.trash")->with('success', 'courses droped');
    }
}
