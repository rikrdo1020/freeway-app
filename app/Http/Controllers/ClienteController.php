<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\User;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Curso;
use App\Http\Controllers\PDFController;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all(); //traer todos los clientes de la tabla
        $data = DB::table('clientes')
        ->join('facturas', 'clientes.id', '=', 'facturas.id')
        ->join('cursos', 'clientes.id', '=', 'cursos.id')
        ->select('clientes.id','clientes.cedula', 'clientes.nombreCompleto', 'facturas.pendiente', 'cursos.tipo_curso')
        ->get();

        //SELECT clientes.cedula, clientes.nombreCompleto, facturas.pendiente FROM clientes INNER JOIN facturas ON clientes.id=facturas.id_cliente
        //select `clientes`.`pendiente`, `clientes`.`nombreCompleto`, `facturas`.`pendiente` from `clientes` inner join `facturas` on `clientes`.`id` = `facturas`.`id_cliente`
        return view('cliente.index')->with('data', $data);//la enviamos a la vista clientes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = new Cliente();
        $facturas = new Factura();
        $cursos = new Curso();
        
        $clientes->cedula =$request->get('cedula');
        $clientes->nombreCompleto =$request->get('nombreCompleto');
        $clientes->direccion =$request->get('direccion');
        $clientes->telefono =$request->get('telefono');

        if(!$clientes->save()){
            App::abort(500, 'Error guardando datos');
        }

        //DB::table('users')->where('username', $username)->value('select_id');    


        $select_id=DB::table('clientes')->where('cedula', $request->get('cedula'))->value('id');
        $facturas->id = $select_id;
              
        $facturas->monto=$request->get('monto');
        $facturas->abono=$request->get('abono');
        $facturas->pendiente=$request->get('pendiente');
        $facturas->cancelacion=$request->get('cancelacion');
        

        if(!$facturas->save()){
            App::abort(500, 'Error guardando datos');
        }


        $select_id=DB::table('clientes')->where('cedula', $request->get('cedula'))->value('id');
        $cursos->id = $select_id;
        $cursos->tipo_curso=$request->get('tipo_curso');
        $cursos->transmision=$request->get('tipo_transmision');

        if(!$cursos->save()){
            App::abort(500, 'Error guardando datos');
        }
        
        
        return redirect('/clientes');

        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$clientes = Cliente::find($id); //traer todos los clientes de la tabla
        $data = DB::table('clientes')
        ->join('facturas', 'clientes.id', '=', 'facturas.id')
        ->join('cursos', 'facturas.id', '=', 'cursos.id')
        ->where('clientes.id', '=', $id)
        ->select('clientes.*', 'facturas.*', 'cursos.*')
        ->first();

        return view('cliente.edit')->with('data', $data);//la enviamos a la vista edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::where('id', $id)->first();

        $cliente->cedula =$request->get('cedula');
        $cliente->nombreCompleto =$request->get('nombreCompleto');
        $cliente->direccion =$request->get('direccion');
        $cliente->telefono =$request->get('telefono');

        $cliente->save();

        $factura = Factura::where('id', $id)->first();
              
        $factura->monto=$request->get('monto');
        $factura->abono=$request->get('abono');
        $factura->pendiente=$request->get('pendiente');
        $factura->cancelacion=$request->get('cancelacion');

        $factura->save();

       
        $curso = Curso::where('id', $id)->first();
        $curso->tipo_curso=$request->get('tipo_curso');
        $curso->transmision=$request->get('tipo_transmision');

        $curso->save();


        return redirect('/clientes');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::where('id', $id)->delete();
        $factura = Factura::where('id', $id)->delete();
        $curso = Curso::where('id', $id)->delete();


        return redirect('/clientes');
    }

    
}
