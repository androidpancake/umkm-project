<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryProduct extends Model
{
    use HasFactory;

    protected $table = 'galleryproduct';
    protected $fillable = [
        'image', 'product_id', 'userumkm_id'
    ];

    public function product()
    {
        return $this->belongsTo(ProdukUMKM::class, 'product_id', 'id');
    }
}
