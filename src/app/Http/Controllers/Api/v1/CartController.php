<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;


class CartController extends Controller
{
    
    public function index(Request $request)
    {

       $ProductIds = Cart::where('user_id', $request->user_id)->select('product_id')->get();
       
        
      
        $producsIncards = Products::findMany($ProductIds);
       
        return  $producsIncards;
    }



    public function store(Request $request)
    {
  
        $Cart = Cart::create([
            "user_id" => $request->user_id,
            "product_id" => $request->product_id,
        ]);

        return [
            "status" => true,
            "post" => $Cart
        ];
    }
    
}
