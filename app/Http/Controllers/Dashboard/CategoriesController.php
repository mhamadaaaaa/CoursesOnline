<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Gate::allows('category.view')){
            abort(403);
        }
        $request = request();
        $categories = category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('category.create');
        // $parant= category::all();
        $categories = new category();
        return view('category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('category.create');
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
        $categories = category::create($data);
        return redirect("category")->with('success', 'categories created');

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
        Gate::authorize('category.update');
        try {
            $categories = category::findOrfail($id);
        } catch (Exception $e) {
            return redirect("category")->with('info', 'objext not found');
        }

        //get بترجع collection ,,,firest ما بترجع collection بترجع ال object نفسه تبع model

        //    ->dd();
        return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('category.update');
        $categories = category::find($id);
        $old_image = $categories->image;
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public'
            ]);
            $data['image'] = $path;
        }
        // $categories->update($request->all());
        $categories->update($data);
        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }
        // $categories = category::update($request->all);
        return redirect("category")->with('success', 'categry updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('category.delete');
        $categories = category::find($id);
        $categories->delete();
        return redirect("category")->with('success', 'category deleated');
    }
    public function trash()
    {
        $categories = category::onlyTrashed()->paginate(4);
        return view('category.trash', compact('categories'));
    }
    public function restore(Request $request, $id)
    {
        $categories = category::onlyTrashed()->findOrfail($id);
        $categories->restore();
        return redirect()->route("category.trash")->with('success', 'categories restored');
    }
    public function forcedeleate($id)
    {
        $categories = category::onlyTrashed()->findOrFail($id);
        $categories->forceDelete();
        return redirect()->route("category.trash")->with('success', 'categories droped');
    }
}
