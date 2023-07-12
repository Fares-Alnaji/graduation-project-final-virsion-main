<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(blog::class , 'blog');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = blog::all();
        return response()->view('dashboard.blog.index', ['blog' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('dashboard.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:400',
           'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $data = new blog();
        $data->name = $request->input('name');
        $data->date = $request->input('data');
        $data->description = $request->input('description');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $path=$file->store('uploads',[
                'disk'=>'public',
            ]);
            $data['image']=$path;
        }
        $saved = $data->save();
        return redirect()->back()->with('success','blog created successfully!');
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
    public function edit(blog $blog)
    {
        //
        $data = blog::find($blog->id);
        return response()->view('dashboard.blog.edit' , ['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, blog $blog)
    {
        //
        $data = blog::find($blog->id);
        $data->name = $request->input('name');
        $data->date = $request->input('data');
        $data->description = $request->input('description');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $path=$file->store('uploads',[
                'disk'=>'public',
            ]);
            $data['image']=$path;
        }
        $saved = $data->save();
        return redirect()->route('blogs.index')->with('success','blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog)
    {
        //
        $deleteCount = blog::destroy($blog->id);
        return redirect()->back()->with('error','blog deleted successfully!');
    }
}
