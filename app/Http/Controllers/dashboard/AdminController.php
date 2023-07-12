<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(admin::class , 'admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admins=admin::with('roles')->paginate(8);
        return response()->view('dashboard.admins.index',compact('admins'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('guard_name' , '=' , 'admin')->get();
        return response()->view('dashboard.admins.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Admin $admin)
    {
        //
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'mobile' => 'required|string',
            'email' => 'required|unique:admins,email',
            'address' => 'required|string|min:5|max:150',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'status' => 'nullable|string|in:active,archived',
            'role_id' => 'required|numeric|exists:roles,id',
            'password' => [
                'required', 'string',
                RulesPassword::min(5)->letters()
            ],
        ]);
        $admin = new admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->address = $request->input('address');
        $admin->mobile = $request->input('mobile');
        $admin->password = Hash::make($request->input('password'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $data['image'] = $path;
         $admin->image =$data['image'];
        }
        $isSaved = $admin->save();
        if($isSaved){
            $admin->assignRole($request->input('role_id'));
        }
        return redirect()->back()->with('success', 'Admin Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
        $roles = Role ::where('guard_name' , '=' , 'admin')->get();
        $currentRole = $admin->roles[0];
        return view('dashboard.admins.edit',compact('admin','roles','currentRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'mobile' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'address' => 'nullable|string|min:5|max:150',
            // 'image' => 'required|image|mimes:jpg,png,jpeg',
            'status' => 'nullable|string|in:active,archived',
            'role_id' => 'required|numeric|exists:roles,id',
        ]);
        $admin->name = $request->input('name');
        $admin->mobile = $request->input('mobile');
        $admin->email = $request->input('email');
        $admin->address = $request->input('address');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $data['image'] = $path;
         $admin->image =$data['image'];
        }
        $isSaved = $admin->save();
        if($isSaved){
            $admin->syncRoles(Role::findById($request->input('role_id'), 'admin'));
        }
        return redirect()->route('admins.index')->with('success','Admin Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
        $admin->delete();
        return redirect()->back()->with('error','Admin Deleted Successfully');
    }
}
