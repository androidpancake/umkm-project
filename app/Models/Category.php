<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'userumkm_id'
    ];

    public function product()
    {
        return $this->hasMany(ProdukUMKM::class);
    }

    public function userumkm()
    {
        return $this->belongsTo(UserUMKM::class, 'userumkm_id', 'id');
    }
}
