<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    public function index()
    {
        $data = Agenda::all();

        return view('admin.agenda.index',[
            'data' => $data
        ]);
    }


    public function insert(Request $request){

        $validatedData = $this->validate($request,[
            'nama_guru' => ['required'],
            'mata_pelajaran' => ['required'],
            'materi' => ['required'],
            'jam_pelajaran' => ['required'],
            'absen' => ['required'],
            'kelas' => ['required'],
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

        return view('admin.agenda.edit',[
            'data' => $agenda
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
