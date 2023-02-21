<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public $table = 'stock';
    
    protected $fillable = [
        'product_id',
        'quantity'
    ];

    protected $appends = ['quantity'];

    public function product()
    {
        return $this->belongsTo(ProdukUMKM::class, 'product_id', 'id');
    }

}
