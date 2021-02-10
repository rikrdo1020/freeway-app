<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function index($id){
        $data = DB::table('clientes')
        ->join('facturas', 'clientes.id', '=', 'facturas.id')
        ->join('cursos', 'facturas.id', '=', 'cursos.id')
        ->where('clientes.id', '=', $id)
        ->select('clientes.*', 'facturas.*', 'cursos.*')
        ->first();

        //return view('cliente.contratoPDF')->with('data', $data);
        $pdf = \PDF::loadView('cliente.contratoPDF', compact('data'));
        return $pdf->stream('contrato.pdf');
    }
}
