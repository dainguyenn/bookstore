<?php

namespace App\Http\Controllers\Frontend;
 
use App\Http\Controllers\Controller;
use App\Models\Books; 
use Illuminate\Http\Request;
use Session;

use App\Cart;

class CartController extends Controller
{
    
    public function addTocart(Request $request ,Books $book)
    {  
         
        $oldCard = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCard);
        $cart->add($book,$book->id);
        $request->session()->put('cart',$cart); 
        
        return back();
    }

    public function getCart()
    {
        
         
        if(!Session::has('cart')){
            return view('frontend.cart');
        } 
        $oldCard = Session::get('cart');
        $cart = new Cart($oldCard);
        $books = $cart->items; 
        $total = $cart->totalPrice;
        return view('frontend.cart',compact(['books','total']));

    }

    public function removeItem(Request $request,$id)
    {
          
        if(!Session::has('cart')){
            return view('frontend.cart');
        } 
        $oldCard = Session::get('cart'); 
        $cart = new Cart($oldCard);
        $cart->removeItem($id);
        if(count($cart->items) == 0){
            $request->session()->forget('cart');
            return view('frontend.cart');

        }else{
            $request->session()->put('cart',$cart); 
            $books = $cart->items; 
            $total = $cart->totalPrice;
            return view('frontend.cart',compact(['books','total']));
        }
        

    }
}
