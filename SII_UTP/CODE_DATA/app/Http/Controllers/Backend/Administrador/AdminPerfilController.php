<?php

namespace App\Http\Controllers\Backend\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Session;
use App\Models\Empleados\Empleado;
use Illuminate\Support\Facades\Hash;
use App\Models\Alumnos\Alumno;
use App\Services\Internal\CRUDControllersInterface; 

class AdminPerfilController extends Controller implements CRUDControllersInterface
{
    //GET
    public function index()
    {   
       
        $usuario         = Auth::user();
        $usuarioEmpleado = $usuario->getEmpleadoInfo($usuario->id);
        return view('Backend.Administrador.index', ['usuario' => $usuario, 'usuarioEmpleado' => $usuarioEmpleado]);
    }

    //GET 
    public function details(Request $r){}

    //GET
    public function show(){}

    //GET
    public function createForm(){}

    //POST
    public function create(Request $r){}

    //GET
    public function updateForm(Request $r){}

    /*POST: funcion para editar perfil*/
    public function update(Request $r)
    {   
        $empleado_id = $r->empleado_id;
        $user_id = $r->user_id; 
        $user = User::find($user_id);
        $empleado = Empleado::find($empleado_id);

         if ($user->email != $r->email) {
            $this->validate($r, [
                'email' => 'required|string|email|max:255|unique:users'
            ]);  
        }
        if ($r->password != null) {
            $this->validate($r, [
                'password' => 'required|string|min:8'
            ]);
        }
         try {
            DB::beginTransaction();
            $empleado->email = $r->email;
            $empleado->save();

            if ($user->email != $r->email) {
                $user->email = $r->email;
            }
            if ($r->password != null) {
                $user->password =  Hash::make($r->password);
            }
           
            $user->save();
            DB::commit();
            Session::flash('success', 'Perfil Actualizado');
        }catch (QueryException $e) {
            DB::rollback();
            Session::flash('error', 'Ocurrio un error!');
        }

        return redirect('/admin/index');
    }  

    //POST JSON
    public function fetch(){}

    //POST
    public function delete(Request $r){}

    //POST
    public function destroy($id){}

    public function getUpdate($tipo)
    {
        $res = null;

        if ($tipo > 0 && $tipo != '3') {
            $res = Empleado::where('tipo', $tipo)
                        ->where('user_id', null)
                        ->select('id', 'nombres', 'paterno', 'materno' ,'tipo')
                        ->get();
        }elseif ($tipo == 3) {
            $res = Alumno::select('id', 'nombres', 'paterno', 'materno' ,'matricula')
                        ->get();
        }
        if (!is_null($res)) {
                return response()->json(['state' => 200, 'datos' => $res ]);
        }
        return $res;
    }

    public function getInfoUser($id)
    {   
        $res = null;
        if ($id != 0) {
            $res = Empleado::where('id', $id)->select('tipo', 'email', 'id', 'nombres')->get();
        }
        if (!is_null($res)) {
            return response()->json(['state' => 200, 'datos' => $res]);
        }
        return $res;
    }

    //GET
    public function addUserSystem()
    {
        $users = count(User::all());
        return view('Backend/Administrador/register')->with('users', $users);
    }


    //POST
    public function addUserSystem1(Request $r)
    {
        $buscarUsuario = "";
        $user_id = $r->user_id;

        $this->validate($r, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($r->tipoUser > 0 && $r->tipoUser != 3 ) {
           $buscarUsuario = Empleado::find($user_id);
           $nombre = $buscarUsuario->nombre.' '.$buscarUsuario->ap_paterno.' '.$buscarUsuario->ap_materno;
        }elseif ($r->tipoUser == 3) {
            $buscarUsuario = Alumno::find('id', $user_id)->select('nombres', 'paterno', 'materno')->first();
            $nombre= $buscarUsuario->nombres.' '.$buscarUsuario->paterno.' '.$buscarUsuario->materno;
        }
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $nombre;
            $user->email = $r->email;
            $user->password = Hash::make($r->password);
            $user->role = $r->tipoUser;
            $user->save();

            $buscarUsuario->user_id = $user->id;
            $buscarUsuario->save();
            DB::commit();

        }catch (QueryException $e) {
             DB::rollback();
        }
        return $this->addUserSystem();
    }
}
