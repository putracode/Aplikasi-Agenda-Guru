<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = "gurus";
    protected $guarded = [''];

    public function agenda(){
        return $this->hasMany(agenda::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }
    
}
