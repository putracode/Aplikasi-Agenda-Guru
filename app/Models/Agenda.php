<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';

    protected $guarded = [''];

    public function guru(){
        return $this->belongsTo(guru::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }
    
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class);
    }


}
