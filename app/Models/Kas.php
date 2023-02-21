<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;

    public $table = 'kas';

    protected $fillable = [
        'userumkm_id',
        'pemasukan'
    ];

    public function userumkm()
    {
        return $this->belongsTo(UserUMKM::class);
    }

    public function transaction()
    {
        return $this->hasMany(Kas::class);
    }
}
