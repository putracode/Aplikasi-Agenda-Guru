<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $data = Mapel::all()->sortBy('nama_mapel');

        return view('mapel.index',[
            'data' => $data,
        ]);
    }

    public function form(){
        $data = Mapel::all();
        return view('Mapel.tambah',[
            'data' => $data,
        ]);
    }

    public function insert(Request $request){

        $this->validate($request,[
            'nama_mapel' => 'required',
        ]);

        Mapel::create($request->all());
        
        return redirect()->route('mapel')->with('Success','Data berhasil Ditambahkan!');
    }


    public function destroy($id){
        $data = mapel::find($id);

        $data->delete();
        
        return redirect()->route('mapel');
    }


    public function edit($id){
        
        $data = Mapel::find($id);

        return view('Mapel.edit',[
            'data' => $data,
        ]);
    }


    public function update(Request $request,$id){
        $data = Mapel::find($id);

        $data->update($request->all());
        
        return redirect()->route('mapel')->with('Edit','Data berhasil Diubah!');
    }

}

