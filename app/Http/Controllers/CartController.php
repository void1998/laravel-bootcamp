<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    //List of cart items
    public function index()
    {
        $cart = session("cart",[]);
        // session()->forget("cart");
        return view("cart.index",["cart"=>$cart]);
    }

    //add to cart
    public function add(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        
        $cart = session("cart",[]);

        if(isset($cart[$id]))
        {
            $cart[$id]["quantity"]++;
            session()->put("cart",$cart);
        }else{
            $item["name"] = $product->name;
            $item["price"] = $product->price;
            $item["quantity"] = 1;

            $cart[$id] = $item;

            session()->put("cart",$cart);
        }
        return redirect()->back()->with("success","added successfully to the cart!");

    }
    //remove from the  cart
    public function remove(Request $request,$id)
    {
         $cart = session("cart",[]);
        if(isset($cart[$id]))
        {
            unset($cart[$id]);
            session()->put("cart",$cart);
        }
        return redirect()->back()->with("success","removed successfully to the cart!");
    }
    //update quantity for cart's items
    public function update(Request $request,$id)
    {
        $data = $request->all();
        $quantity = $data["quantity"];
        $cart = session("cart",[]);
        if(isset($cart[$id]))
        {
            $cart[$id]["quantity"] = $quantity;
            session()->put("cart",$cart);
        }
        return redirect()->back()->with("success","updated successfully to the cart!");
    }

}
