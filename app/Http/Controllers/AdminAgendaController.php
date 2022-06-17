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
        $data = Agenda::all()->sortByDesc('created_at');
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
            'name' => ['required'],
            'mapel_id' => ['required'],
            'materi' => ['required'],
            'jam_pelajaran' => ['required'],
            'absen' => ['required'],
            'jumlah_hadir' => ['required'],
            'jumlah_tidak_hadir' => ['required'],
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
        
        return redirect()->route('adminagenda')->with('Success','Data berhasil Ditambahkan!');
    }


    public function destroy($id){
        
        $agenda = agenda::find($id);

        $agenda->delete();
        
        return redirect()->route('adminagenda');
    }


    public function edit($id){
        
        $agenda = agenda::find($id);

        $guru = Guru::all()->sortBy('nama_guru');
        $mapel = mapel::all()->sortBy('nama_mapel');
        $kelas = Kelas::all()->sortBy('nama_kelas');

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
        $guru = Guru::all()->sortBy('nama_guru');
        $kelas = Kelas::all()->sortBy('nama_kelas');
        $mapel = Mapel::all()->sortBy('nama_mapel');

        return view('agenda.admin.tambah',[
            'data' => $data,
            'guru' => $guru,
            'kelas' => $kelas,
            'mapel' => $mapel
        ]);
    }

    public function filter(Request $request){
        if (request()->dari || request()->sampai) {
            // $dari = Carbon::request('dari')->toDateTimeString();
            // $sampai = Carbon::request('sampai')->toDateTimeString();
            $sampai = explode('-', request('sampai'));
            $sampai = $sampai[0]. '-' . $sampai[1] . '-' . intval($sampai[2]) + 1;
            // dd($sampai);
            $data = Agenda::whereBetween('created_at',[request('dari'), $sampai])->get();
        } else {
            $data = Agenda::latest()->get();
        }

        // $data = Agenda::where('user_id',auth()->user()->id)->get();
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
}
