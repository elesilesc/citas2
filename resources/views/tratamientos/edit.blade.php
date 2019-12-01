@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar tratamiento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($tratamiento, [ 'route' => ['tratamientos.update',$tratamiento->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('initTime', 'Fecha de inicio') !!}
                            {!! Form::text('initTime',$tratamiento->initTime,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('endTime', 'Fecha de fin') !!}
                            {!! Form::text('endTime',$tratamiento->endTime,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripcion del tratamiento') !!}
                            {!! Form::text('descripcion',$tratamiento->descripcion,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('units', 'Unidades del medicamento') !!}
                            {!! Form::text('units',$tratamiento->units,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('frecuencia', 'Frecuencia en horas') !!}
                            {!! Form::text('frecuencia',$tratamiento->frecuencia,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('instrucciones', 'Instrucciones al paciente') !!}
                            {!! Form::text('instrucciones',$tratamiento->instrucciones,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('medicamento_id', 'Medicamento') !!}
                            <br>
                            {!! Form::select('medicamento_id', $medicamentos, $tratamiento->medicamento_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('cita_id', 'Cita paciente') !!}
                            <br>
                            {!! Form::select('cita_id', $citas, $tratamiento->cita_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

