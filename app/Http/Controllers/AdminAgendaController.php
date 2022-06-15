<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAgendaController extends Controller
{
    public function index()
    {
        $data = Agenda::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();

        return view('agenda.admin.index',[
            'data' => $data,
            'guru' => $guru,
            'kelas' => $kelas,
            'mapel' => $mapel
        ]);
    }


    public function insert(Request $request){

        

        $validatedData = $this->validate($request,[
            'guru_id' => ['required'],
            'mapel_id' => ['required'],
            'materi' => ['required'],
            'jam_pelajaran' => ['required'],
            'absen' => ['required'],
            'kelas_id' => ['required'],
            'pembelajaran' => ['required'],
            'link' => ['required'],
            'image' => ['required','image'],
            'keterangan' => ['required']
        ]);

        // if($request->file('image')){
        //     $validatedData['image'] = $request->file('image')->store('agenda-image');
        // }

        $data = Agenda::create($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('imageagenda/',$request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        
        return redirect()->route('agenda')->with('Success','Data berhasil Ditambahkan!');
    }


    public function destroy($id){
        
        $agenda = agenda::find($id);

        $agenda->delete();
        
        return redirect()->route('adminagenda');
    }


    public function edit($id){
        
        $agenda = agenda::find($id);

        $guru = Guru::all();
        $mapel = mapel::all();
        $kelas = Kelas::all();

        return view('agenda.admin.edit',[
            'data'  => $agenda,
            'guru' => $guru,
            'kelas' => $kelas,
            'mapel' => $mapel
        ]);
    }


    public function update(Request $request,$id){
        $data = agenda::find($id);

        $data->update($request->all());
        
        if($request->hasFile('image')){
            $request->file('image')->move('imageagenda/',$request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('adminagenda')->with('Edit','Data berhasil Diubah!');
    }

    public function form(){
        $data = Agenda::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();

        return view('agenda.admin.tambah',[
            'data' => $data,
            'guru' => $guru,
            'kelas' => $kelas,
            'mapel' => $mapel
        ]);
    }
}
