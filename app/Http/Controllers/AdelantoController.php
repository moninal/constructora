<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdelantoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adelanto=DB::select("SELECT c.*,a.entrega,e.descripcion as equipo, case when c.estado=0 then 'black' when c.estado=1 then 'red' when c.estado=2 then 'green' end as color, case when c.estado=0 then 'Activo' when c.estado=1 then 'Eliminado' when c.estado=2 then 'Cancelado' end as estadosituacion
                               from cabadelanto as c
                               inner join alquiler as a on (a.idalquiler=c.idalquiler)
                               inner join equipo as e on (e.idequipo=a.idequipo) ");
        return view('alquiler.operaciones.adelanto.index') 
               ->with("adelanto",$adelanto);
    } 
 
    
    public function formeditaradelanto ($id){

        date_default_timezone_set("America/Lima");
        $adelanto=DB::select("SELECT c.*,a.entrega,e.descripcion as equipo, case when c.estado=0 then 'black' when c.estado=1 then 'red' end as color, case when c.estado=0 then 'Activo' when c.estado=1 then 'Eliminado' end as estadosituacion
                               from cabadelanto as c
                               inner join alquiler as a on (a.idalquiler=c.idalquiler)
                               inner join equipo as e on (e.idequipo=a.idequipo)
                               where idadelanto=$id "); 

        $detadelanto=DB::select("SELECT d.monto, d.fechareg
                               from detadelanto as d
                               where idadelanto=$id
                               order by iddetadelanto, d.fechareg desc"); 
        $totdetadelanto=DB::select("SELECT sum(d.monto) as totalmonto
                               from detadelanto as d
                               where idadelanto=$id ");
        $fechareg =date("d-m-Y");
        $fecharegval =date("Y-m-d");

        return view('alquiler.operaciones.adelanto.formeditaradelanto')
               ->with("adelanto",$adelanto)
               ->with("detadelanto",$detadelanto)
               ->with("totdetadelanto",$totdetadelanto)
               ->with("fechareg",$fechareg)
               ->with("fecharegval",$fecharegval);
    }

    public function editaradelanto(Request $request){

        
        header('Content-Type: application/json');
        date_default_timezone_set("America/Lima");

        $data=$request->all();
        $id=$data["id"];
        $fechareg1=$data["fechareg1"]; 
        $entregan=$data["entregan"];  
        $glosa=$data["glosa"]? $data["glosa"]: ''; 
        
        ///trabajo realizado
        if(isset($data["abonar"])){
        $ctra=count($data["abonar"]);
        }else{
            $ctra=0;
        } 

        $fecharegval =date("Y-m-d");
        $result=DB::table("detadelanto")
                ->where("idadelanto",$id)
                ->where("fechareg",$fecharegval)
                ->delete();

        for ($i=0; $i <$ctra ; $i++) {  
            $abonar=$data["abonar"][$i]; 
            $fechareg=$data["fecharegn"][$i];    
            $resulttrabajo = DB::insert("INSERT INTO detadelanto(idadelanto,fechareg,monto) VALUES(?,?,?)", [$id,$fechareg,$abonar]);
            $val=0;
        } 
        if($entregan==0){
         DB::table("cabadelanto")
                 ->where("idadelanto",$id)
                 ->update([
                    "estado" => 2,
                    "glosa" => $glosa
                 ]);
        }else{ 
         DB::table("cabadelanto")
                 ->where("idadelanto",$id)
                 ->update([
                    "estado" => 0,
                    "glosa" => $glosa
                 ]);
        }
        if ($val==0) {  

            $data = array('guardado' => 0 );

        }else{ 
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
   
    }

    public function borrar_proveedor($id){
        $result=DB::table("proveedor")
                ->where("idproveedor",$id)
                ->delete();
        /*$result = DB::table("producto")
                 ->where("idproducto",$id)
                 ->update([
                    "estado" => 1 
                 ]);*/ 
    }
}
