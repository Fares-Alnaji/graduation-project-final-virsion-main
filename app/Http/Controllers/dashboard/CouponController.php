<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Coupon::class , 'coupon');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Coupon::all();
        return response()->view('dashboard.coupon.index', ['coupon' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('dashboard.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'discount' => 'required',
        ]);

        $data = new Coupon();
        $data->code = $request->input('name');
        $data->discount = $request->input('discount');
        $data->expiry_date = $request->input('expiry_date');
        $saved = $data->save();
        return redirect()->route('coupons.index')->with('success','coupon created successfully!');
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
    public function edit(Coupon $coupon)
    {
        //
        $data = Coupon::find($coupon->id);
        return response()->view('dashboard.coupon.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Coupon $coupon)
    {
        //
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'discount' => 'required',
        ]);

        $data = Coupon::findOrFail($coupon->id);
        $data->code = $request->input('name');
        $data->discount = $request->input('discount');
        $data->expiry_date = $request->input('expiry_date');
        $saved = $data->save();
        return redirect()->route('coupons.index')->with('success','coupon updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
        $deleteCount = Coupon::destroy($coupon->id);
        return redirect()->back()->with('error','coupon deleted successfully!');
    }
}
