<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Review;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    //
    public function show(Product $product)
    {
        //
        if (!$product->status == "active" ) {
            abort(403);
        }
        return view('front.single-product',compact('product'));

    }
    public function addToCart(Request $request)
    {
        if (Auth::guard('web')->check()) {
            $cart = new Cart;
            $cart->user_id= Auth::guard('web')->user()->id ;
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/');

        }else{
            return redirect('/front/userLogin');
        }
    }

}
