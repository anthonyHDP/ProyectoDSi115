@extends ('layouts.admin')
@section ('contenido')
   <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Editar Expediente de Paciente: {{$paciente->apellido}}</h3>
    		@if (count($errors)>0)
    		<div class="alert alert-danger">
    			<ul>
    			@foreach ($errors->all() as $error)
    				<li>{{$error}}</li>
    			@endforeach	
    			</ul>	
    		</div>
    		@endif

    		{!!Form::model($paciente,['method'=>'PATCH','route'=>['clinica.paciente.update',$paciente->idPaciente]])!!}
    		{{Form::token()}}

    		<div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{$paciente->apellido}}" placeholder="Apellido...">  
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$paciente->nombre}}" placeholder="Nombre...">  
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{$paciente->telefono}}" placeholder="Telefono...">    
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control" value="{{$paciente->direccion}}" placeholder="Direccion...">    
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input type="text" name="fechaNacimiento" class="form-control" value="{{$paciente->fechaNacimiento}}" placeholder="fecha de Nacimiento...">    
            </div>
            <div class="form-group">
                <label for="tipoSangre">Tipo de Sangre</label>
                <input type="text" name="tipoSangre" class="form-control" value="{{$paciente->tipoSangre}}" placeholder="Tipo de Sangre...">    
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <input type="text" name="sexo" class="form-control" value="{{$paciente->sexo}}" placeholder="Sexo...">    
            </div>
            <div class="form-group">
                <label for="estadoCivil">Estado Civil</label>
                <input type="text" name="estadoCivil" class="form-control" value="{{$paciente->estadoCivil}}" placeholder="Estado Civil...">    
            </div>

    		<div class="form-group">
    			<button class="btn btn-primary" type="submit">Guardar</button>
    			<button class="btn btn-danger" type="reset">Cancelar</button>
    		</div>
    		{!!Form::close()!!}

    	</div>
   </div>
@endsection