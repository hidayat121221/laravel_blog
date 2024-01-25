<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsToMany(Category::class,'Category_id','id')->select('id','name');
    }

    public function Subcategory(){
        return $this->belongsToMany(SubCategory::class,'subCategory_id','id')->select('id','name');
    }

}
