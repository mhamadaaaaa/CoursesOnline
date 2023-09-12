<?php

namespace App\Http\Controllers\Dashboard;
use Google_Service_YouTube;
use App\Http\Controllers\Controller;
use App\Models\courses;
use App\Models\video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Gate::allows('video.view')){
            abort(403);
        }
        $request = request();
        $video = video::all();
        return view('video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('video.create');
        $course= courses::all();
        $video = video::all();
        $video = new video();
        return view('video.create',compact('course','video'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('video.create');
        // $request->merge([
        //     'slug' => Str::slug($request->post('name')),
        // ]);
        $data = $request->all();
        // $data = $request->except('image');
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $path = $file->store('videos', [
        //         'disk' => 'public'
        //     ]);
        //     // dd($path);
        //     $data['image'] = $path;
        // }
        $video = video::create($data);
        return redirect("video")->with('success', 'video created');
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
        Gate::authorize('video.update');
        try {
            $course= courses::all();
            $video = video::findOrfail($id);
        } catch (Exception $e) {
            return redirect("video")->with('info', 'objext not found');
        }

        //get بترجع collection ,,,firest ما بترجع collection بترجع ال object نفسه تبع model

        //    ->dd();
        return view('video.edit', compact('video','course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('video.update');
        $video = video::find($id);
        // $old_image = $video->image;
        // $data = $request->except('image');
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $path = $file->store('videos', [
        //         'disk' => 'public'
        //     ]);
        //     $data['image'] = $path;
        // }
        // // $courses->update($request->all());
        // $video->update($data);
        // if ($old_image && isset($data['image'])) {
        //     Storage::disk('public')->delete($old_image);
        // }
        // $courses = courses::update($request->all);
        $data = $request->all();
        $video->update($data);
        return redirect("video")->with('success', 'video updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('video.delete');
        $video = video::find($id);
        $video->delete();
        return redirect("video")->with('success', 'video deleated');
    }
}
