<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// refernciamos el modelo para Paciente
use App\Models\Paciente;

class PacienteController extends Controller
{
    function __construct()
    {
        //definimos los permisos para Paciente
        $this->middleware('permission:ver-paciente|crear-paciente|editar-paciente|borrar-paciente', ['only'=>['index']]);
        $this->middleware('permission:crear-paciente', ['only'=>['create','store']]);
        $this->middleware('permission:editar-paciente', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-paciente', ['only'=>['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paciente = Paciente::paginate (5);
        return view('pacientes.index', compact('paciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //me retorna a la vista pacientes.crear
        return view('pacientes.crear');
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
            'nombre' => 'required',
          //  'apellido' => 'required',
           // 'numCedula' =>'required, | numCedula |unique:paciente,numCedula',
            'telefono' =>'required',
            //'fechaNacimiento' =>'required',
            'direccion' =>'required',
           // 'ciudad' =>'required',
            'genero' =>'required',
            'email' => 'required,|email|unique:paciente,email',
            'password' =>'required |same:confirm-password',

        ]);

        Paciente::create($request->all());
        return redirect()->route('pacientes.index');

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
    public function edit(Paciente $paciente)
    {
        //
        return view('pacientes.editar', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //realiza una validacion de los datos
        request()->validate([
            'nombre' => 'required',
            //  'apellido' => 'required',
             // 'numCedula' =>'required, | numCedula |unique:paciente,numCedula',
              'telefono' =>'required',
              //'fechaNacimiento' =>'required',
              'direccion' =>'required',
             // 'ciudad' =>'required',
              'genero' =>'required',
              'email' => 'required,|email|unique:paciente,email',
              'password' =>'required |same:confirm-password',

        ]);
        $paciente->update($request->all());
        return redirect()-> route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect ()->route('pacientes.index');
    }
}
