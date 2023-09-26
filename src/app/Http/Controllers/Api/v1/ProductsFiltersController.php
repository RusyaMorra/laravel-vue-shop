<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Validator;


class ProductsFiltersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return Products::orderBy('price', 'ASC')->get();
    }


}
