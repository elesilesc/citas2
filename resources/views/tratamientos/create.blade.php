@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear tratamiento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'tratamientos.store']) !!}
                        <div class="form-group">
                            {!! Form::label('initTime', 'Fecha de inicio') !!}
                            <input type="datetime-local" id="initTime" name="initTime" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />

                        </div>
                        <div class="form-group">
                            {!! Form::label('endTime', 'Fecha de fin') !!}
                            <input type="datetime-local" id="endTime" name="endTime" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />

                        </div>
                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripcion del tratamiento') !!}
                            {!! Form::text('descripcion',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('units', 'Unidades del medicamento') !!}
                            {!! Form::text('units',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('frecuencia', 'Frecuencia en horas') !!}
                            {!! Form::text('frecuencia',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('instrucciones', 'Instrucciones al paciente') !!}
                            {!! Form::text('instrucciones',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('cita_id', 'Cita paciente') !!}
                            <br>
                            {!! Form::select('cita_id', $citas, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection