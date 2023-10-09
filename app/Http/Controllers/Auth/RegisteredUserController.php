<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth');
    }
 
    public function create()
    {
        $users=DB::select("SELECT *  from users ");
        return view('auth.registro')
               ->with("users",$users);

    }

    public function form_nuevo_usuario()
    { 
        return view('usuario.form_nuevo_usuario') ;
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tipo' => $request->tipo,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        //Auth::login($user);

        return redirect(RouteServiceProvider::REGISTER);

    }
    public function form_editar_usuario ($id){

        $usuario=DB::table("users")
                  ->where("id",$id)
                  ->get(); 
        return view('usuario.form_editar_usuario')
               ->with("usuario",$usuario) ;
    }
  
    public function editar_usuario(Request $request){

        header('Content-Type: application/json');

        $data=$request->all();
        $id=$data["id"];
        $name=$data["name"];
        $email=$data["email"];
        $password= Hash::make($data["password"]); 

        $result = DB::table("users")
                 ->where("id",$id)
                 ->update([
                    "name" => $name,
                    "email" => $email,
                    "password" => $password
                 ]);

        if ($result) {
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
   
    }


    public function borrar_usuario($id){
        $result=DB::table("users")
                ->where("id",$id)
                ->delete();
    }

}
