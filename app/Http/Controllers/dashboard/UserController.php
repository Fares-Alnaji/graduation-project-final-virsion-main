<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::Paginate(5);
        return response()->view('dashboard.users.index', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'mobile' => 'required|digits:10|unique:users,id|numeric',
            'email' => 'required|unique:users,email',
            'address' => 'required|string|min:5|max:150',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'password' => [
                'required', 'string', Password::min(5)
                    ->letters()
            ],
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->password = Hash::make($request->input('password'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $data['image'] = $path;
            $user->image = $data['image'];
        }
        $user->save();
        return redirect()->back()->with('success', 'user created successfully!');
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
    public function edit(User $user)
    {
        //
        $user = DB::table('users')->where('id', '=', $user->id)->first();
        return response()->view('dashboard.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            // 'email' => 'required|email|exists:users,email,id' . $user->id,
            'mobile' => 'required|digits:10|unique:users,id|numeric',
            'address' => 'nullable|string|min:3|max:50'
        ]);
        // $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $data['image'] = $path;
            $user->image = $data['image'];
        }
        $user->save();

        return redirect()->route('users.index')->with('success', 'user updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //

        // $user = User::findOrFail($id);
         $user->delete();
        return redirect()->back()->with('error', 'User Deleted  Successfully!');
    }
}
