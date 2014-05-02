@extends('layouts.master')

@section('contenido')

<div class="container">
    <div class="col-xs-10 col-sm-6 col-md-4">
        <h1>Cambia tu clave</h1>
        @if(Session::has('mensajeOk'))
            <div class="alert alert-success">
                {{ Session::get('mensajeOk') }}
            </div>
        @endif
        @if(Session::has('mensajeError'))
            <div class="alert alert-danger">
                {{ Session::get('mensajeError') }}
            </div>
        @endif

        {{ Form::open(array('url' => 'usuarios/cambiar-clave', 'role' => 'form')) }}

            <div class="form-group">
                {{ Form::label('clave', 'Clave actual', array('class' => 'label label-success')) }}
                {{ Form::password('clave', array('class' => 'form-control', 'placeholder' => 'Clave actual', 'required')) }}
                @if($errors->has('clave'))
                    {{ Form::label('clave', $errors->first('clave'), array('class' => 'label label-warning')) }}
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('clave2', 'Nueva clave', array('class' => 'label label-success')) }}
                {{ Form::password('clave2', array('class' => 'form-control', 'placeholder' => 'Nueva clave', 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('clave2_confirmation', 'Confirmar nueva clave', array('class' => 'label label-success')) }}
                {{ Form::password('clave2_confirmation', array('class' => 'form-control', 'placeholder' => 'Nueva clave', 'required')) }}
                @if($errors->has('clave2'))
                    {{ Form::label('clave2', $errors->first('clave2'), array('class' => 'label label-warning')) }}
                @endif
            </div>

            {{ Form::submit('Cambiar', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>

@stop