<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();

        
        return view('admin.kelas.index',[
            'data' => $data,
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

        kelas::create($request->all());
        
        return redirect()->route('kelas');
    }


    public function destroy($id){
        
        $guru = kelas::find($id);

        $guru->delete();
        
        return redirect()->route('kelas');
    }


    public function edit($id){
        
        $guru = kelas::find($id);

        return view('admin.kelas.edit',[
            'data' => $guru
        ]);
    }


    public function update(Request $request,$id){
        $data = kelas::find($id);

        $data->update($request->all());
        
        return redirect()->route('kelas');
    }
}
