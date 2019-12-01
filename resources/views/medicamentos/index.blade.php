@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicamentos</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicamentos.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear medicamentos', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Composicion</th>
                                <th>Link</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($medicamentos as $medicamento)


                                <tr>
                                    <td>{{ $medicamento->nombre }}</td>
                                    <td>{{ $medicamento->composicion }}</td>
                                    <td>{{ $medicamento->link }}</td>
                                    <td>{{ $medicamento->tratamiento->descripcion}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['medicamentos.edit',$medicamento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicamentos.destroy',$medicamento->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está segur@?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection