<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//agregamos las librerias de Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    function __construct()
    {
        //definimos los permisos para Rol
        $this->middleware('permission:ver-rol | crear-rol | editar-rol | borrar-rol', ['only'=>['index']]);
        $this->middleware('permission:crear-rol', ['only'=>['create','strore']]);
        $this->middleware('permission:editar-rol', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-rol', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles=Role::paginate(5); //paginamos los registros cada 5 registros muestre una pagina
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //hacemos uso de la clase permission
        //$permission sera una variable a la cual le asignamos el valor de Permission
        //create es la funcion crud y crear sera la plantilla .blade
        $permission = Permission::get();
        return view ('roles.crear', compact('permission'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //para guardar name en ingles porque asi estan definidas las tablas que genera spatie
        $this ->validate($request, ['name'=> 'required', 'permission'=>'required']);
        $role=Role::create (['name'=>$request->input ('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect ()->route('roles.index');

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
        //role_has_permissions hace mension a la tabla que stisla
        //crea automaticcamente en la Base de Datos DB
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table ('role_has_permissions')->where ('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('roles.editar', compact('role', 'permission', 'rolePermissions'));

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
        //
        $this ->validate($request, ['name'=> 'required', 'permission'=>'required']);

        
        $role=Role::find($id);
        $role->name=$request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table ('roles')->where('id',$id)->delete();
        return redirect()->route ('roles.index');
    }
}
