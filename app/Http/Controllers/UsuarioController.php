<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// invocamos a todos los modulos, clases que necesita el controlador

use App\Http\Controllers\Controller; //llama al controlador Controller
use App\Models\User; //llama al modelo User
use Spatie\Permission\Models\Role; //llama al modelo Role que esta en permissions
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

use Illuminate\Validation\Validator;
//Validation\Validator::validateRequired


//Libreria de Spatie
use Spatie\Permission\Models\Permission;

//use Illuminate\Support\Facades\Validator;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //pagina index
    public function index()
    {
        //
       $usuarios= User:: paginate (5);
       return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //funciones para crear usuarios
        $roles =Role::pluck('name', 'name')->all();
        return view ('usuarios.crear', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate ($request, [
            'name' => 'required',
            'email' => 'required,|email|unique:users,email',
            'password' =>'required, |same:confirm-password',
            'roles' =>'required'
       ]);


        $input = $request->all();
        $input ['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index');
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
    public function edit($id)
    {
        //Funcion para editar un usuario
        $user =User::find($id);
        $roles =Role::pluck('name', 'name')->all();
        $userRole=$user->roles->pluck('name', 'name')->all();

        return view ('usuarios.editar', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //funcion para actualizar datos del usuario
         $this->validate($request,[
            'name' => 'required',
            'email' => 'required,|email|unique:users,email', $id,
            'password' =>'same:confirm-password',
            'roles' =>'required'
        ]);

        $input =$request->all();
        if(!empty($input['password'])){
            $input['password']=Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }


        $user =User::find($id);
        $user ->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //funcion para eliminar un usuario
        User::find($id)->delete();
        return redirect()-route('usuarios.index');
    }
}
