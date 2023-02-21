<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserUMKM extends Authenticatable
{
    use HasFactory;

    protected $table = 'userumkm';
    
    protected $fillable = [
        'name',
        'namaumkm',
        'deskripsi',
        'alamat',
        'avatar',
        'bidangusaha',
        'phone_number',
        'email',
        'password',
        'status',
        'approved_at'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    // public function userUMKM(){
    //     return $this->belongsTo(User::class);
    // }

    public function produkUMKM(){
        return $this->hasMany(ProdukUMKM::class);
    }

    public function complaintUMKM(){
        return $this->belongsToMany(Complaint::class, 'umkm_id', 'id');
    }
}
