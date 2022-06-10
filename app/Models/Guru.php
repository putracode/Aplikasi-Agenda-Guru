<?php

namespace App\Models;

use App\Models\Mapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    protected $table = "guru";
    protected $guarded = [''];

    public function agenda(){
        return $this->hasMany(agenda::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class);
    }
    
    public function kelas(){
        return $this->hasOne(Kelas::class);
    }
}
