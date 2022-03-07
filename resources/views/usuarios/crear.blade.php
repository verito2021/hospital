@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registrar Usuarios del Sistema SIGEC</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

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

                            {!! Form::open (array ('route'=>'usuarios.store', 'method'=>'POST'))!!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            {!!Form::text('name', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="identificacion">Identificación</label>
                                            {!!Form::number('identificacion', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            {!!Form::tel('telefono', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            {!!Form::text('direccion', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="ciudad">Ciudad</label>
                                            {!!Form::text('ciudad', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="genero">Genero:</label>
                                                <select id="genero" name="genero" class="form-control">
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="LGTB">LGTB</option>
                                                 </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="nacimiento">Fecha de Nacimiento</label>
                                            {!!Form::date ('nacimiento', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="edad">Edad</label>
                                            {!!Form::text('edad', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="profesion">Profesión</label>
                                            {!!Form::text('profesion', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="email">E-Mail</label>
                                            {!!Form::text('email', null, array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            {!!Form::password ('password', array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="confirm-password">Confirmar Contraseña</label>
                                            {!!Form::password ('confirm-password', array('class'=>'form-control'))!!}
                                        </div>
                                    </div>

                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Roles</label>
                                            {!!Form::select ('roles[]', $roles,[], array ('class'=> 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12-col-md-12">
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

