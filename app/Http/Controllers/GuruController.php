<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{

    public function index()
    {

        $data = Guru::all();
        $user = User::where('role','guru')->get();
        $mapel = mapel::all();
        return view('admin.guru.index',[
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
        
        return redirect()->route('guru');
    }


    public function destroy($id){
    
        $guru = Guru::find($id);

        $guru->delete();
        
        return redirect()->route('guru');
    }


    public function edit($id){
        
        $guru = Guru::find($id);

        $isiuser = User::where('role','guru')->get();
        $isiguru = Guru::all();
        $isimapel = mapel::all();

        return view('admin.guru.edit',[
            'data' => $guru,
            'isidata' => $isiguru,
            'isiuser' => $isiuser,
            'isimapel' => $isimapel
        ]);
    }


    public function update(Request $request,$id){

        $data = Guru::find($id);
        $data->update($request->all());
        return redirect()->route('guru');
    }
}
