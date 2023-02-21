<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    
    public $table = 'transaction';

    protected $fillable = [
        'userumkm_id',
        'total_price',
        'date',
    ];


    public function userumkm()
    {
        return $this->belongsTo(UserUMKM::class, 'userumkm_id');
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function kas()
    {
        return $this->belongsTo(Kas::class, 'kas_id');
    }
}
