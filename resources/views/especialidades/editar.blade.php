@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Especialidades</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- aqui van las opciones de editar una especialidad -->
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('especialidades.update', $especialidades->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
<!--
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label for="nbEspecialidad"> Nombre</label>
                                           <input type="text" name="nbEspecialidad" class="form-control" value="{{ $especialidades->nbEspecialidad }}">
                                        </div>
                                    </div>
                    -->

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="nbEspecialidad">Nombre</label>
                                            {!!Form::text('nbEspecialidad', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label for="descripcion"> Descripción</label>
                                           <input type="text" name="descripcion" class="form-control" value="{{ $especialidades->descripcion }}">
                                        </div>
                                    </div>
<!--
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label for="fechaRegistro"> Fecha Registro</label>
                                           <input type="date" name="fechaRegistro" class="form-control" value="{{ $especialidades->fechaRegistro }}" disabled="disabled">
                                        </div>
                                    </div>
                                -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="fechaModificacion">Fecha de Modificación</label>
                                            {!!Form::date ('fechaModificacion', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>
<!--
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label for="usuarioRegistro"> Usuario Registro </label>
                                           <input type="text" name="descripcion" class="form-control" value="{{ $especialidades->usuarioRegistro }}">
                                        </div>
                                    </div>
                  -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="usuarioModificacion">Usuario Modifica</label>
                                            {!!Form::text ('usuarioModificacion', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <label for="estado">Estado</label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="estado" id="Activa" value="{{ $especialidades->estado }}">
                                            <label  class="form-check-label" for="Activa"> Activo </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="estado" id="Inactiva" value="{{ $especialidades->estado }}">
                                            <label  class="form-check-label" for="Inactiva"> Inactivo </label>
                                        </div>
                                    </div>
                                  
                                    <div class="col-xs-12 col-sm-12-col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

