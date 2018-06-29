@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">
                    Has iniciado Sesión!
                    <center>
                    <h4><a href="{{url('clinica')}}"><button class="btn btn-success">Ir al Menu Principal</button></a></h4>
                    </center>

                </div>

                
            </div>
        </div>
    </div>
    
    <div class="row">
        <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b><strong><a href="{{url('seguridad')}}">Menu Administrador</a>.</strong></b>
                    </div>
                    
        </footer>
    </div>
</div>
@endsection
