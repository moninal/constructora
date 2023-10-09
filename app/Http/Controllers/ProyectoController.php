<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProyectoController extends Controller
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
        $ciudad=DB::select("SELECT c.*, case when c.estado=0 then 'ACTIVO' when c.estado=1 then 'INACTIVO' end as estado
                              from ciudad as c "); 
        return view('proyecto.catalogo.ciudad.index') 
               ->with("ciudad",$ciudad);
    } 
    
    public function formnuevociudad()
    { 
        return view('proyecto.catalogo.ciudad.formnuevociudad') ;
    }

    public function guardarciudad(Request $request){

        header('Content-Type: application/json');
        date_default_timezone_set("America/Lima");

        $data=$request->all();
        $descripcion=$data["descripcion"];  

        $result = DB::insert("INSERT INTO ciudad(descripcion) VALUES(?)", [$descripcion]);
        if ($result) {
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
    }

    public function formeditarciudad ($id){

        $ciudad=DB::table("ciudad")
                  ->where("idciudad",$id)
                  ->get(); 
        return view('proyecto.catalogo.ciudad.formeditarciudad')
               ->with("ciudad",$ciudad) ;
    }

    public function editarciudad(Request $request){

        header('Content-Type: application/json');

        $data=$request->all();
        $id=$data["id"];
        $descripcion=$data["descripcion"]; 
        $estado=$data["estado"]; 

        $result = DB::table("ciudad")
                 ->where("idciudad",$id)
                 ->update([
                    "descripcion" => $descripcion,
                    "estado" => $estado
                 ]);

        if ($result) {
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
   
    }

    public function borrarciudad($id){
        $result=DB::table("ciudad")
                ->where("idciudad",$id)
                ->delete();
    }

    public function actividad()
    {
        $actividad=DB::select("SELECT a.*
                              from actividad as a "); 
        return view('proyecto.catalogo.actividad.index') 
               ->with("actividad",$actividad);
    } 

    public function formnuevoactividad()
    { 
        return view('proyecto.catalogo.actividad.formnuevoactividad') ;
    }
    public function guardaractividad(Request $request){

        header('Content-Type: application/json');
        date_default_timezone_set("America/Lima");

        $data=$request->all();
        $descripcion=$data["descripcion"];  

        $result = DB::insert("INSERT INTO actividad(descripcion) VALUES(?)", [$descripcion]);
        if ($result) {
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
    }

    public function formeditaractividad ($id){

        $actividad=DB::table("actividad")
                  ->where("idactividad",$id)
                  ->get(); 
        return view('proyecto.catalogo.actividad.formeditaractividad')
               ->with("actividad",$actividad) ;
    }

    public function editaractividad(Request $request){

        header('Content-Type: application/json');

        $data=$request->all();
        $id=$data["id"];
        $descripcion=$data["descripcion"];  

        $result = DB::table("actividad")
                 ->where("idactividad",$id)
                 ->update([
                    "descripcion" => $descripcion 
                 ]);

        if ($result) {
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
   
    }

    public function borraractividad($id){
        $result=DB::table("actividad")
                ->where("idactividad",$id)
                ->delete();
    }

    public function ingresoproyecto()
    {
        $proyecto=DB::select("SELECT p.*, c.descripcion as ciudad,  case when p.estado=0 then 'PENDIENTE' when p.estado=1 then 'TERMINADO' when p.estado=2 then 'ELIMINADO' end as estadositu
                              from proyecto as p
                              inner join ciudad as c on (c.idciudad=p.idciudad) 
                              order by idproyecto desc "); 
        return view('proyecto.operaciones.ingreso.index') 
               ->with("proyecto",$proyecto);
    } 

    public function formnuevoproyecto()
    { 
        $ciudad=DB::select("SELECT c.*
                              from ciudad as c "); 
        $actividad=DB::select("SELECT a.*
                              from actividad as a "); 
        return view('proyecto.operaciones.ingreso.formnuevoproyecto') 
               ->with("ciudad",$ciudad)
               ->with("actividad",$actividad);
    }

    public function guardarproyecto(Request $request){

        header('Content-Type: application/json');
        date_default_timezone_set("America/Lima");

        $data=$request->all();
        $propietario=$data["propietario"];  
        $idciudad=$data["idciudad"];  
        $idactividad=$data["idactividad"];  
        $detalleactividad=$data["detalleactividad"]? $data["detalleactividad"]: '';   
        $detalleavance=$data["detalleavance"]? $data["detalleavance"]: '';    
        if(isset($data["idactividadn"])){
        $ctra=count($data["idactividadn"]);
        }else{
            $ctra=0;
        } 
        $result = DB::insert("INSERT INTO proyecto(propietario,idciudad,detalleactividad,detalleavance) VALUES(?,?,?,?)", [$propietario,$idciudad,$detalleactividad,$detalleavance]);

        $proyecto=DB::select("select max(idproyecto) as ultimo
                              from proyecto  ") ;
        for ($i=0; $i <$ctra ; $i++) {  
            $idactividadn=$data["idactividadn"][$i];   
            $resulttrabajo = DB::insert("INSERT INTO detproyecto(idproyecto,idactividad) VALUES(?,?)", [$proyecto[0]->ultimo, $idactividadn]);
        } 

        if ($result) {
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
    }

    public function formeditarproyecto ($id){

        $proyecto=DB::table("proyecto")
                  ->where("idproyecto",$id)
                  ->get(); 

        $ciudad=DB::select("SELECT c.*
                              from ciudad as c "); 
        $actividad=DB::select("SELECT a.*
                              from actividad as a ");
        $detproyecto=DB::select("SELECT a.descripcion as actividad, d.idactividad
                              from detproyecto as d
                              inner join proyecto as p on (p.idproyecto=d.idproyecto) 
                              inner join actividad as a on (a.idactividad=d.idactividad)
                              where d.idproyecto=$id "); 
        return view('proyecto.operaciones.ingreso.formeditarproyecto')
               ->with("actividad",$actividad)
               ->with("ciudad",$ciudad)
               ->with("proyecto",$proyecto)
               ->with("detproyecto",$detproyecto) ;
    }

    public function editarproyecto(Request $request){

        header('Content-Type: application/json');

        $data=$request->all();
        $id=$data["id"];
        $propietario=$data["propietario"];  
        $idciudad=$data["idciudad"];    
        $detalleactividad=$data["detalleactividad"]? $data["detalleactividad"]: '';   
        $detalleavance=$data["detalleavance"]? $data["detalleavance"]: ''; 

        $result = DB::table("proyecto")
                 ->where("idproyecto",$id)
                 ->update([
                    "propietario" => $propietario, 
                    "idciudad" => $idciudad,  
                    "detalleactividad" => $detalleactividad,
                    "detalleavance" => $detalleavance 
                 ]);

        $result2=DB::table("detproyecto")
                ->where("idproyecto",$id) 
                ->delete();

        $val=0;
        if(isset($data["idactividadn"])){
          $val=1;
          $ctra=count($data["idactividadn"]);
        }else{
            $ctra=0;
        }
        for ($i=0; $i <$ctra ; $i++) {  
            $idactividadn=$data["idactividadn"][$i];   
            $resulttrabajo = DB::insert("INSERT INTO detproyecto(idproyecto,idactividad) VALUES(?,?)", [$id, $idactividadn]);
        }

        if ($result) {
            $data = array('guardado' => 0 );
        }else{
          if ($val==1) {
            $data = array('guardado' => 0 );
          }else{
            $data = array('guardado' => 1 );
          }
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
   
    }

    public function borrarproyecto($id){
        $result=DB::table("proyecto")
                 ->where("idproyecto",$id)
                 ->update([
                    "estado" => 2
                 ]);
    }



}
