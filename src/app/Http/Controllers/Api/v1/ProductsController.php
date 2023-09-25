<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Validator;
use App\DTO\ProductsForm;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return Products::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "name" => ["required"],
                "price" => ["required"],
                "img" => ["required"],
                "description" => ["required"],
                "cat_name" => ["required"],
                "is_available" => ["required"]
            ]
        );

        if ($validator->fails()) {
            return [
                "status" => false,
                "errors" => $validator->messages()
            ];
        }
         
        
       //моя реализация dto, первый раз такое делаю в php да и вообще слышу такой термин
        // в typescript обычно все очень за типизированно и там это через интерфейсы делаеться и types
        // так что если что укажете на ошибки в моей простой реализации  паттерна
        $productsForm = new ProductsForm();
         
        $data = $productsForm->fromRequest($request); //DTO обьект
        $post = Products::create($data); 

        return [
            "status" => true,
            "post" => $post
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Products::find($id);
        if (!$post) {
            return response()->json([
                "status" => false,
                "message" => "Post not found"
            ])->setStatusCode(404);
        }

        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $isavailable;

        if($request->isavailable == 'да'){
            $isavailable = 1;
        }else{
            $isavailable = 0;
        }

        Products::find($id)->update([
            "name" => $request->name,
            "price" => $request->price,
            "img" => $request->img,
            "description" => $request->description,
            "cat_name" => $request->cat_name,
            "is_available" => $isavailable,
        ]);
     

        return [
            "id" => $id,
            "status" => true,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::find($id)->delete();
     

        return [
            "id" => $id,
            "status" => true,
        ];
    }
}
