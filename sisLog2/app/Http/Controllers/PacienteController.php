<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use sisLog2\Paciente;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\PacienteFormRequest;
use DB;

class PacienteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $pacientes=DB::table('paciente')->where('apellido','LIKE','%'.$query.'%')
            ->orderBy('idPaciente','desc')
            ->paginate(7);
            return view('clinica.paciente.index',["pacientes"=>$pacientes,"searchText"=>$query]);
        }
    }

    public function create()
    {
    	return view("clinica.paciente.create"); 
    }

    public function store(PacienteFormRequest $request)
    {
    	$paciente = new Paciente;
    	$paciente->nombre=$request->get('nombre');
    	$paciente->apellido=$request->get('apellido'); 
    	$paciente->telefono=$request->get('telefono');
        $paciente->tipoSangre=$request->get('tipoSangre');
        $paciente->direccion=$request->get('direccion');
        $paciente->fechaNacimiento=$request->get('fechaNacimiento');
        $paciente->sexo=$request->get('sexo');
        $paciente->estadoCivil=$request->get('estadoCivil');
    	$paciente->save();

    	return Redirect::to('clinica/paciente');
    }

    public function show($id)
    {
    	return view("clinica.paciente.show",["paciente"=>Paciente::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("clinica.paciente.edit",["paciente"=>Paciente::findOrFail($id)]);
    }

    public function update(PacienteFormRequest $request,$id)
    {
    	$paciente=Paciente::findOrFail($id);
    	$paciente->nombre=$request->get('nombre');
        $paciente->apellido=$request->get('apellido'); 
        $paciente->telefono=$request->get('telefono');
        $paciente->tipoSangre=$request->get('tipoSangre');
        $paciente->direccion=$request->get('direccion');
        $paciente->fechaNacimiento=$request->get('fechaNacimiento');
        $paciente->sexo=$request->get('sexo');
        $paciente->estadoCivil=$request->get('estadoCivil');
    	$paciente->update();
        
    	return Redirect::to('clinica/paciente');
    }

    public function destroy($id)
    {
    	$paciente=Paciente::findOrFail($id);
    	$paciente->delete();

    	return Redirect::to('clinica/paciente');
    }
}
