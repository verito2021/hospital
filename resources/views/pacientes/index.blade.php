
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">PACIENTES HOSPITAL BÁSICO "EL ORO"</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                             <!--FUCION PARA CREAR UN PACIENTE -->
                             @can('crear-rol')
                             <a class="btn btn-warning" href="{{route('paciente.create')}}">Nuevo</a>
                             @endcan

                            <table class= "table table-striped mt-2">
                                <thead style="background-color:#6777ef;">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombres</th>
                                    <th style="color:#fff;">Apellidos</th>
                                    <th style="color:#fff;">Num Cedula</th>
                                    <th style="color:#fff;">Telefono</th>
                                    <th style="color:#fff;">Edad</th>
                                    <th style="color:#fff;">Direccion</th>
                                    <th style="color:#fff;">Ciudad</th>
                                    <th style="color:#fff;">Genero</th>
                                    <th style="color:#fff;">Email</th>
                                    <th style="display: none;">Contraseña</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>

                                    @foreach($paciente as $pacien)
                                        <tr>
                                            <td style="display: none;">{{$pacien->id}}</td>
                                            <td>{{$pacien->nombre}}</td>
                                            <td>{{$pacien->apellido}}</td>
                                            <td>{{$pacien->numCedula}}</td>
                                            <td>{{$pacien->telefono}}</td>
                                            <td>{{$pacien->fechaNacimiento}}</td>
                                            <td>{{$pacien->direccion}}</td>
                                            <td>{{$pacien->ciudad}}</td>
                                            <td>{{$pacien->genero}}</td>
                                            <td>{{$pacien->email}}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

