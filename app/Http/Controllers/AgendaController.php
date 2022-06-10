<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    public function index()
    {
        $data = Agenda::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();

        return view('admin.agenda.index',[
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
        
        return redirect()->route('agenda');
    }


    public function destroy($id){
        
        $agenda = agenda::find($id);

        $agenda->delete();
        
        return redirect()->route('agenda');
    }


    public function edit($id){
        
        $agenda = agenda::find($id);

        $guru = Guru::all();
        $mapel = mapel::all();
        $kelas = Kelas::all();

        return view('admin.agenda.edit',[
            'data' => $agenda,
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

        return redirect()->route('agenda');
    }
}
