<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('site.products', compact('products'));
    }


    public function cart()
    {
        return view('site.cart');
    }


    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // $cart[$id]['quantity'] = ($cart[$id]['quantity'] < $product->qty) ?  $cart[$id]['quantity']++ : $product->qty;
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $product->title,
                "quantity" => 1,
                "max_qty" => $product->qty,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function sale()
    {
        $total = 0;
        $items = [];
        foreach ((array) session('cart') as $item) {
            $total += $item['price'] * $item['quantity'];
            array_push($items, $item['id']);
        }
    }
}
