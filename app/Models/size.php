<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function productmodel(){
        return $this->belongsTo(productmodel::class,"product_id","id");
    }
}
