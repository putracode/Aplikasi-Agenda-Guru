<?php

namespace App\Models;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;

    protected $table = "mapel";
    protected $guarded = [''];

    public function guru(){
        return $this->hasMany(Guru::class);
    }

    public function agenda(){
        return $this->hasMany(Agenda::class);
    }


}
