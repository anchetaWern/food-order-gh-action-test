<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;

use App\Models\Order;

class CartController extends Controller
{

    public function index(CartService $cart)
    {
        Order::make();
        $cart_items = $cart->get();
        return view('cart', compact('cart_items'));
    }


    public function store(CartService $cart): RedirectResponse
    {
        $cart->add(request('id'));
        return redirect('/cart');
    }


    public function destroy(CartService $cart): RedirectResponse
    {
        $id = request('id');
        $cart->remove($id);

        return redirect('/cart');
    }


    public function update(CartService $cart): RedirectResponse
    {
        $cart->update(request('id'), request('qty'));
        return redirect('/cart');
    }
}
