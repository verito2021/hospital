<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// refernciamos el modelo para Especialidades
use App\Models\Especialidades;

class EspecialidadesController extends Controller
{
    function __construct()
    {
        //definimos los permisos para Especielidades
        $this->middleware('permission:ver-especialidades | crear-especialidades | editar-especialidades | borrar-especialidades', ['only'=>['index']]);
        $this->middleware('permission:crear-especialidades', ['only'=>['create','strore']]);
        $this->middleware('permission:editar-especialidades', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-especialidades', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //compact('especialidades') es el arreglo que se le envia $especialidades
        // tener en cuenta especialidad es como se lo va ha llamar en plantilla especilidades.index
        $especialidades = Especialidades::paginate (5);
        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //me retorna a la vista especialidades.crear
        return view ('especialidades.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //realiza una validacion de los datos
        request()->validate([
            'nbEspecialidades' => 'required',
            'descripcion' => 'required',
            'fechaRegistro' =>'required',
            'fechaModificacion' =>'required',
            'usuarioRegistro' =>'required',
            'usuarioModificacion' =>'required',
            'estado' =>'required',
        ]);

        Especialidades::create($request->all());
        return redirect()->route('especialidades.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidades $especialidad)
    {
        //especilidad=es a como nos vamos a referir en la plnatilla especialidades.editar
        //especialidad=guardara los valores de todas las colunmas de la tabla Especialidades
        return view('especialidades.editar', compact('especilidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidades $especialidad)
    {
        //
        request ()->validate([
            'nbEspecialidades' => 'required',
            'descripcion' => 'required',
            'fechaRegistro' =>'required',
            'fechaModificacion' =>'required',
            'usuarioRegistro' =>'required',
            'usuarioModificacion' =>'required',
            'estado' =>'required',
        ]);
        $especialidad->update($request->all());
        return redirect()-> route('especialidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidades $especialidad)
    {
        //eliminar una Especialidad
        $especialidad->delete();
        return redirect ()->route('especialidades.index');

    }
}
