<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use App\CartOps;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addToCart(string $id)
    {
        if (Auth::guard('web')->check()) {
            $product = Product::find($id);
            $cart = new CartOps();
            $cart->addToCart($product);
            return back();
        } else {
            return redirect('front/userLogin');
        }
    }

    public function showCart()
    {
        $cart = session('cart', [
            'total_price' => 0,
            'items' => collect()
        ]);
        return response()->view('front.cart', compact('cart'));
    }

    public function delete($id)
    {
        $cart = session()->get('cart', []);

        foreach ($cart['items'] as $index => $item) {
            if ($item['object']->id == $id) {
                unset($cart['items'][$index]);
                break;
            }
        }
        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Item removed from cart.');
    }
    public function decreaseQty(string $id)
    {
        $product = Product::find($id);
        $cart = new CartOps();
        $cart->decrease($product);
        return back();
    }
}
