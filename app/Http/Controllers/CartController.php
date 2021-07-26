<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart($idProduct)
    {
        $product = Product::find($idProduct);

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $cart->add($product);

        session()->put('cart', $cart);

        return back();
    }

    function index()
    {
        $cart = session()->get('cart');
        return view('shop.cart.index', compact('cart'));
    }

    function deleteToCart($idProduct)
    {
        $product = Product::find($idProduct);
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $cart->delete($product);
        session()->put('cart', $cart);

        return response()->json(['message' => 'Delete success'] );

    }

    function updateToCart(Request $request, $idProduct)
    {
        $product = Product::find($idProduct);
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $cart->update($product, $request->newQuantity);
        session()->put('cart', $cart);

        $data = [
            'productUpdate' => session()->get('cart')->items[$idProduct],
            'totalPriceCart' => session()->get('cart')->totalPrice,
        ];

        return response()->json($data);

    }
}
