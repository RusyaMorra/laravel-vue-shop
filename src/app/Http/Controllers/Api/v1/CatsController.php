<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Cats;
use Illuminate\Http\Request;
use Validator;

class CatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cats::all();
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "cat_name" => ["required"],
                "cat_tag" => ["required"],
            ]
        );

        if ($validator->fails()) {
            return [
                "status" => false,
                "errors" => $validator->messages()
            ];
        }

        $cats = Cats::create([
            "cat_name" => $request->cat_name,
            "cat_tag" => $request->cat_tag,
            "perent_cat_tag" => $request->perent_cat_tag,
            "perent_cat_tag" => $request->perent_cat_tag,
            "perent_cat_tag" => $request->perent_cat_tag,
        ]);

        return [
            "status" => true,
            "post" => $cats
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
        $cats = Cats::find($id);
        if (!$cats) {
            return response()->json([
                "status" => false,
                "message" => "Post not found"
            ])->setStatusCode(404);
        }

        return  $cats;
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
      

        Cats::find($id)->update([
            "cat_name" => $request->cat_name,
            "cat_tag" => $request->cat_tag,
            "perent_cat_tag" => $request->perent_cat_tag,
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
        Cats::find($id)->delete();
     

        return [
            "id" => $id,
            "status" => true,
        ];
    }
}
