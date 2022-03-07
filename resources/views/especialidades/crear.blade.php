@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registrar Nuevas Especialidades</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                               <strong>>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                       <span class="badge badge-danger">{{$error}}</span>
                                   @endforeach

                               <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>

                        @endif
                        {!! Form::open (array ('route'=>'especialidades.store', 'method'=>'POST'))!!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nbEspecialidad">Nombre</label>
                                    {!!Form::text('nbEspecialidad', null, array('class'=>'form-control'))!!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    {!!Form::text('descripcion', null, array('class'=>'form-control'))!!}
                                </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="fechaRegistro">Fecha de Registro</label>
                                    {!!Form::date ('fechaRegistro', null, array('class'=>'form-control'))!!}
                                </div>
                            </div>
<!--
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="fechaModificacion">Fecha de Modificación</label>
                                    {!!Form::date ('fechaModificacion', null, array('class'=>'form-control'))!!}
                                </div>
                            </div>
              -->
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="usuarioRegistro">Usuario Registro</label>
                                    {!!Form::text ('usuarioRegistro', null, array('class'=>'form-control'))!!}
                                </div>
                            </div>
<!--
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="usuarioModificacion">Usuario Modifica</label>
                                    {!!Form::text ('usuarioModificacion', null, array('class'=>'form-control'))!!}
                                </div>
                            </div>
                        -->
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="estado">Estado</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="estado" id="Activa" value="Activa">
                                    <label  class="form-check-label" for="Activa"> Activo </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="estado" id="Inactiva" value="Inactiva">
                                    <label  class="form-check-label" for="Inactiva"> Inactivo </label>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12-col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    {!! Form::close()!!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

