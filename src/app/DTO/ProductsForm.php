<?php
namespace App\DTO;

use Illuminate\Http\Request;


class ProductsForm
{
    
    public string $name;
    public string $price;
    public string $img;
    public string $description;
    public string $cat_name;
    public  $isavailable;
    
    public function __construct()
    {
        
    }


    public function fromRequest(Request $request){
        

       $isavailable;

        if($request->is_available == 'да'){
            $isavailable = 1;
        }else{
            $isavailable = 0;
        }


        return [

            "name" => $request->name,

            "price" => $request->price,

            "img" => $request->img,

            "description" => $request->description,

            "cat_name" => $request->cat_name,

            "is_available" => $isavailable,

        ];

    }

  

}
