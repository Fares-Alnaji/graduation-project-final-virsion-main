<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(category::class , 'category');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categories = category::withCount('products')->paginate(8);
        return response()->view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $parents = category::all();
        return response()->view('dashboard.categories.create', ['parents' => $parents]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required', 'string', 'min:3', 'max:255',
            ],
            'description' => [
                'nullable', 'string', 'min:5', 'max:200'
            ],
            'image' => [
                'mimes:png,jpg'
            ],
            'status' => 'in:active,archived',
        ]);

        $category = new category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $data['image'] = $path;
        $category->image =$data['image'];
        }
        $category->status = $request->input('status');
        $category->save();
        return Redirect::route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //

        $category = category::findOrFail($category->id);
        return response()->view('dashboard.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
        $request->validate([
            'name' => [
                'required', 'string', 'min:3', 'max:255',
            ],
            'description' => [
                'nullable', 'string', 'min:5', 'max:200'
            ],

            'status' => 'nullable|in:active,archived',
        ]);
        $category = category::findOrFail($category->id);
        $old_image = $category->image;
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $data['image'] = $path;
        }
        $category->update($data);
        return redirect()->route('categories.index')->with('success','Category Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
        $category = category::findOrFail($category->id);
        $category->delete();
        return redirect()->back()->with('error','Category Deleted Successfully!');
    }
    public function trash()
    {
        $categories = category::onlyTrashed()->paginate();
        return response()->view('dashboard.categories.trash', ['categories' => $categories]);
    }
    public function restore($id)
    {
        $category = category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('categories.index');
    }
    public function forceDelete($id)
    {
        $category = category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        return redirect()->route('categories.trash');
    }
}
