<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    // public function categories()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    protected $table = "products";

    protected $fillable =[
        "pname",
        "mname"
    ];
}
