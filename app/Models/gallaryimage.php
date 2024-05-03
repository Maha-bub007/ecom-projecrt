<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallaryimage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function productmodel(){
        return $this->belongsTo(productmodel::class,"peoduct_id","id");
    }
}
