<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart($idProduct) {
        $product = Product::find($idProduct);

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $cart->add($product);

        session()->put('cart', $cart);

        return back();
    }

    function showCart() {
        $cart = session()->get('cart');
        $itemsIntoCart = $cart->items;

    }
}
