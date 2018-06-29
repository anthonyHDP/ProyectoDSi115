<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use sisLog2\Medico;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\MedicoFormRequest;
use DB;

class MedicoController extends Controller
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
            $medicos=DB::table('medico')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idMedico','desc')
            ->paginate(7);
            return view('clinica.medico.index',["medicos"=>$medicos,"searchText"=>$query]);
        }
    }

    public function create()
    {
    	return view("clinica.medico.create"); 
    }

    public function store(MedicoFormRequest $request)
    {
    	$medico = new Medico;
    	$medico->nombre=$request->get('nombre');
    	$medico->especialidad=$request->get('especialidad'); 
    	$medico->telefono=$request->get('telefono');
        $medico->correo=$request->get('correo');
        $medico->direccion=$request->get('direccion');
    	$medico->save();

    	return Redirect::to('clinica/medico');
    }

    public function show($id)
    {
    	return view("clinica.medico.show",["medico"=>Medico::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("clinica.medico.edit",["medico"=>Medico::findOrFail($id)]);
    }

    public function update(MedicoFormRequest $request,$id)
    {
    	$medico=Medico::findOrFail($id);
    	$medico->nombre=$request->get('nombre');
        $medico->especialidad=$request->get('especialidad'); 
        $medico->telefono=$request->get('telefono');
        $medico->correo=$request->get('correo');
        $medico->direccion=$request->get('direccion');
    	$medico->update();
        
    	return Redirect::to('clinica/medico');
    }

    public function destroy($id)
    {
    	$medico=Medico::findOrFail($id);
    	$medico->delete();

    	return Redirect::to('clinica/medico');
    }
}
