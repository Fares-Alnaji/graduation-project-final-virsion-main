<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\contact;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data = Slider::active()->get();
        $products = Product::query()->paginate(8);
        return response()->view('front.index', compact('products', 'data'));
    }
    public function ShowAllPorducts()
    {
        $products = Product::query()->paginate(9);
        return response()->view('front.shop', compact('products'));
    }
    public function contact()
    {
        $contact = contact::all();
        return response()->view('front.contact', compact('contact'));
    }
    public function blog()
    {
        $blog = blog::latest()->paginate(4);
        return response()->view('front.blog', compact('blog'));
    }
}
