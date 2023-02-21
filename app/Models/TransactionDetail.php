<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    public $table = 'transaction_detail';

    protected $fillable = [
        'transaction_id',
        'product_id',
        'price',
        'qty',
        'sub_total'
    ];

    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(ProdukUMKM::class, 'product_id');
    }
}
