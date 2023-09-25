<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
class CartController extends Controller
{
    
    public function index()
    {// выводим товар = номеру товаров колонке cart в где юзер равен числу с фронта
      
        return Cart::all();
    }



    public function store(Request $request)
    {
  
        $cats = Cats::create([
            "user_id" => $request->cat_name,
            "product_id" => $request->cat_tag,
        ]);

        return [
            "status" => true,
            "post" => $cats
        ];
    }
    
}
