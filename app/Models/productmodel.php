<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productmodel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
    public function subcategory()
    {
        return $this->belongsTo(subcategory::class, 'subcat_id', 'id');
    }
    public function color()
    {
        return $this->hasMany(color::class, "product_id", "id");
    }
    public function size()
    {
        return $this->hasMany(size::class, "product_id", "id");
    }
    public function gallaryimage()
    {
        return $this->hasMany(gallaryimage::class, "peoduct_id", "id");
    }
}
