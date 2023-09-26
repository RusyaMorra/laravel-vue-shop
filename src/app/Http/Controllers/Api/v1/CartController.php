<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;


class CartController extends Controller
{
    
    public function index(Request $request)
    {// выводим товар = номеру товаров колонке cart в где юзер равен числу с фронта
       $carts = Cart::where('user_id', $request->user_id)->all();
       //$carts->product_id;
       
       
      // $productArray = $carts->select(['product_id']);
       //Products::all()



       

        return $carts ;
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
