<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    
    public function replies(){
        return $this->belongsTo(Reply::class, 'complaint_id', 'complaint_id');
    }
}
