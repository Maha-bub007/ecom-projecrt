<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productmodel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function subcategory(){
        return $this->belongsTo(subcategory::class,'subcat_id','id');
    }
}
