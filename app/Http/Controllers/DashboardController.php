<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AgendaExport;
use App\Exports\AgendaExportAdmin;
use App\Models\Agenda;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function exportexcelguru(){
        return Excel::download(new AgendaExport, 'agenda.xlsx');
    }

    public function exportexceladmin(){
        return Excel::download(new AgendaExportAdmin, 'agenda.xlsx');
    }
}
