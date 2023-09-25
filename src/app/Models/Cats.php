<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
   
     protected $fillable = ['id','cat_name','cat_tag', 'perent_cat_tag', 'posts_count', 'is_shown'];
    

}
