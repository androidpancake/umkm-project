<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $primaryKey = "complaint_id";

    public function user_umkm(){
        return $this->belongsTo(UserUMKM::class, 'umkm_id', 'id');
    }

    public function replies(){
        return $this->hasMany(Reply::class, 'complaint_id', 'complaint_id');
    }
    public function user_admin(){
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
