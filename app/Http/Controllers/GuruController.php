<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Guru;
use App\Models\User;
use App\Models\Mapel;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class GuruController extends Controller
{

    public function index()
    {

        $data = Guru::all()->sortBy('nama_guru');
        
        $user = User::where('role','guru')->get();
        $mapel = mapel::all();
        return view('guru.index',[
            'data' => $data,
            'user' => $user,
            'mapel' => $mapel
        ]);
    }


    public function insert(Request $request){
        $this->validate($request,[
            'nama_guru' => 'required',
            'nik_guru' => 'required',
            'mapel_id' => 'required',
            'user_id' => 'required'
        ]);

        Guru::create($request->all());
        
        return redirect()->route('guru')->with('Success','Data berhasil Ditambahkan!');
    }


    public function destroy($id){
    
        $guru = Guru::find($id);

        $guru->delete();
        
        return redirect()->route('guru');
    }


    public function edit($id){
        
        $gurus = Guru::find($id);

        $user = User::where('role','guru')->get()->sortBy('name');
        $guru = Guru::all()->sortBy('nama_guru');
        $mapel = mapel::all()->sortBy('nama_mapel');

        return view('guru.edit',[
            'data' => $gurus,
            'guru' => $guru,
            'user' => $user,
            'mapel' => $mapel
        ]);
    }


    public function update(Request $request,$id){

        $data = Guru::find($id);
        $data->update($request->all());
        return redirect()->route('guru')->with('Edit','Data berhasil Diubah!');
    }

    public function form(){
        $data = Guru::all();
        $user = User::where('role','guru')->get()->sortBy('name');
        $mapel = mapel::all()->sortBy('nama_mapel');
        return view('guru.tambah',[
            'data' => $data,
            'user' => $user,
            'mapel' => $mapel
        ]);
    }

    
}
