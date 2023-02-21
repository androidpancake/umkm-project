<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukUMKM extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $guarded = [];

    public function userumkm(){
        return $this->belongsTo(UserUMKM::class, 'userumkm_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(GalleryProduct::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
