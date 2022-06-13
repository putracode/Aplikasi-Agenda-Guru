<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AgendaExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function exportexcel(){
        return Excel::download(new AgendaExport, 'dataagenda.xlsx');
    }
}
