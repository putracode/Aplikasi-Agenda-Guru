<?php

namespace App\Exports;

use App\Models\Agenda;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


class AgendaExportAdmin implements FromView,WithColumnWidths,WithStyles,WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {   
        
        if (request('dari') || request('sampai')) {
            $sampai = explode('-', request('sampai'));
            $sampai = $sampai[0]. '-' . $sampai[1] . '-' . intval($sampai[2]) + 1;
            $data =  Agenda::select('agendas.name', 'agendas.materi', 'agendas.jam_pelajaran', 'agendas.jumlah_hadir', 'agendas.jumlah_tidak_hadir', 'agendas.absen', 'agendas.pembelajaran', 'agendas.link', 'agendas.image', 'agendas.keterangan', 'agendas.created_at', 'mapel.nama_mapel', 'kelas.nama_kelas')->whereBetween('agendas.created_at',[request('dari'), $sampai])
            ->where('user_id',auth()->user()->id)
            ->leftJoin('mapel', 'mapel.id', 'agendas.mapel_id')
            ->leftJoin('kelas', 'kelas.id', 'agendas.kelas_id')
            ->get();

            return view('export.excel2', [
                'data' => Agenda::whereBetween('agendas.created_at',[request('dari'), $sampai])->get()
            ]);
            
        }else{
            return view('export.excel2', [
                'data' => Agenda::all()
            ]);
        }  
    }
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 20,
            'C' => 12,            
            'D' => 15,
            'E' => 10,            
            'F' => 13,
            'G' => 50,            
            'H' => 14,
            'I' => 18,            
            'J' => 18,
            'K' => 20,            
            'L' => 17,            
        ];
    }
    public function columnHeights(): array
    {
        return [
            'A' => 5,
            'B' => 20,
            'C' => 12,            
            'D' => 15,
            'E' => 10,            
            'F' => 13,
            'G' => 50,            
            'H' => 14,
            'I' => 18,            
            'J' => 18,
            'K' => 20,            
            'L' => 17,            
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
    public function drawings()
    {   
        
        $data = Agenda::all();
        $image = [];
        $row = 2;
        foreach($data as $key=>$citato){
            $drawing = new Drawing();
            $drawing->setName('Dokumentasi');
            $drawing->setDescription('ini dokumentasi');
            $drawing->setPath(public_path('/imageagenda/' . $citato->image));
            $drawing->setHeight(50);
            $drawing->setWidth(50);
            $drawing->setCoordinates('J'.$row);
            $image[] = ($drawing);
        }
        return $image;
    }
}
