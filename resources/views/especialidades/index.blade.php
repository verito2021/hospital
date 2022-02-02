@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">AREAS MEDICAS DEL HOSPITAL</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <!--FUCION PARA CREAR UN ESPECIALIDAD -->
                            @can('crear-especialidades')
                              <a class="btn btn-warning" href="{{route('especialidades.create')}}">Nuevo</a>
                            @endcan

                            <table class= "table table-striped mt-2">
                                <thead style="background-color:#6777ef;">
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Descripcion</th>
                                    <th style="color:#fff;">Fecha Reg.</th>
                                    <th style="color:#fff;">Fecha Modif.</th>
                                    <th style="color:#fff;">Usuario Reg.</th>
                                    <th style="color:#fff;">Usuario Modif.</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Acciones.</th>
                                </thead>
                                <tbody>


                                     @foreach($especialidades as $especialidad)
                                     <tr>
                                        <td style="display: none;">{{$especialidad->id}}</td> <!--display:none trae el id pero no lo presenta en pantalla-->
                                        <td>{{$especialidad->nbEspecialidades}}</td>
                                        <td>{{$especialidad->descripcion}}</td>
                                        <td>{{$especialidad->fechaRegistro}}</td>
                                        <td>{{$especialidad->fechaModificacion}}</td>
                                        <td>{{$especialidad->usuarioRegistro}}</td>
                                        <td>{{$especialidad->usuarioModificacion}}</td>
                                        <td>{{$especialidad->estado}}</td>

                                        <td>
                                            <form action="{{route('especialidades.destroy', $especialidad->id)}}" method="POST">
                                                @can('editar-especialidades')
                                                  <a class="btn btn-info" href="{{route('especialidades.edit', $especialidad->id)}}">Editar</a>
                                                @endcan

                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-especialidades')
                                                    <button type= "submit" class=btn btn-danger>Borrar</button>
                                                @endcan
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>


                            </table>
                            <div class="pagination justify-content-end">
                                {!! $especialidades->links()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


