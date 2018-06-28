@extends ('layouts.admin')
@section ('contenido')
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Expediente de paciente <a href="paciente/create"><button class="btn btn-success">Nuevo Expediente</button></a></h3>
            @include('clinica.paciente.search')
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>tipo Sangre</th>
                        <th>sexo</th>
                        <th>estado Civil</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($pacientes as $paci)
                    <tr>
                        <td>{{ $paci->idPaciente}}</td>
                        <td>{{ $paci->apellido}}</td>
                        <td>{{ $paci->nombre}}</td>
                        <td>{{ $paci->telefono}}</td>
                        <td>{{ $paci->direccion}}</td>
                        <td>{{ $paci->tipoSangre}}</td>
                        <td>{{ $paci->sexo}}</td>
                        <td>{{ $paci->estadoCivil}}</td>
                        <td>
                            <a href="{{URL::action('PacienteController@edit', $paci->idPaciente)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$paci->idPaciente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('clinica.paciente.modal')
                    @endforeach
                </table>
            </div>
            {{$pacientes->render()}}
        </div>
    </div>


@endsection