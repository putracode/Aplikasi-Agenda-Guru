<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GuruController extends Controller
{

    public function index()
    {

        $user = User::all();
        $data = Guru::all();
        return view('admin.guru.index',[
            'data' => $data,
            'user' => $user
        ]);
    }


    public function insert(Request $request){

                // $this->validate($request,[
                //     'nama_guru' => 'required',
                //     'nik_guru' => 'required',
                //     'mata_pelajaran' => 'required',
                //     'username' => 'required',
                //     'password' => 'required'
                // ]);

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

        return view('admin.guru.edit',[
            'data' => $guru
        ]);
    }


    public function update(Request $request,$id){
        $data = Guru::find($id);

        $data->update($request->all());
        
        return redirect()->route('guru');
    }
}
