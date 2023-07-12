<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Slider::class , 'slider');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Slider::all();
        return response()->view('dashboard.slider.index', ['slider' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $data = Slider::all();
        return response()->view('dashboard.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // //
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:500',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:3025',
            'status' => 'in:active,draft,archived',
        ]);

        $data = new Slider();
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
         if($request->hasFile('image')){
             $file=$request->file('image');
             $path=$file->store('uploads',[
                 'disk'=>'public',
             ]);
             $data['image']=$path;
         }
        $saved = $data->save();
        return redirect()->route('sliders.index')->with('success','slider saved successfully!');
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
    public function edit(Slider $slider)
    {
        //
        $data = Slider::find($slider->id);
        return response()->view('dashboard.slider.edit' , ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Slider $slider)
    {

        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:500',
            // 'image' => 'required|image|mimes:jpg,png,jpeg',
            'status' => 'in:active,draft,archived',

        ]);

        $data = Slider::findOrFail($slider->id);
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->status = $request->input('status');

         if($request->hasFile('image')){
             $file=$request->file('image');
             $path=$file->store('uploads',[
                 'disk'=>'public',
             ]);
             $data['image']=$path;
         }
        $saved=$data->save();
        return redirect()->route('sliders.index')->with('success','slider updated successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
        $deleteCount = Slider::destroy($slider->id);
        return redirect()->back()->with('error','slider deleted successfully!');;

    }
}
