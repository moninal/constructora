<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AlquilerExport;

class AlquilerController extends Controller
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
    public function equipoalquiler()
    {
        $equipo=DB::select("SELECT *  from equipo order by idequipo desc ");
        return view('alquiler.catalogo.equipo.equipoalquiler') 
               ->with("equipo",$equipo);
    } 

    public function form_nuevo_equipo()
    { 
        return view('alquiler.catalogo.equipo.form_nuevo_equipo') ;
    }

    public function guardarequipoalquiler(Request $request){

        header('Content-Type: application/json');
        date_default_timezone_set("America/Lima");

        $data=$request->all();
        $descripcion=$data["descripcion"]; 
        $monto=$data["monto"]; 

        $result = DB::insert("INSERT INTO equipo(descripcion,monto) VALUES(?,?)", [$descripcion,$monto]);
        if ($result) {
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
    }
 
    
    public function formeditarequipo ($id){

        $equipo=DB::table("equipo")
                  ->where("idequipo",$id)
                  ->get(); 
        return view('alquiler.catalogo.equipo.formeditarequipo')
               ->with("equipo",$equipo) ;
    }

    public function editarequipoalquiler(Request $request){

        header('Content-Type: application/json');

        $data=$request->all();
        $id=$data["id"];
        $descripcion=$data["descripcion"]; 
        $monto=$data["monto"]; 

        $result = DB::table("equipo")
                 ->where("idequipo",$id)
                 ->update([
                    "descripcion" => $descripcion,
                    "monto" => $monto
                 ]);

        if ($result) {
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
   
    }

    public function borrarequipo($id){
        $result=DB::table("equipo")
                ->where("idequipo",$id)
                ->delete();
    }


    public function alquiler()
    { date_default_timezone_set('America/Lima'); 
        $alquiler =DB::select("SELECT a.*, case when a.estado=0 then 'Activo' else 'Eliminado' end as estado  , e.descripcion as equipo, case when a.estado=0 then 'black' else 'red' end as color 
                              from alquiler as a 
                              inner join equipo as e on (e.idequipo=a.idequipo) 
                              order by idalquiler desc "); 
        return view('alquiler.operaciones.alquiler.index')
               ->with("alquiler",$alquiler)  ;
    } 
    public function formnuevoalquiler()
    {   date_default_timezone_set('America/Lima'); 
        $equipo=DB::select("SELECT *  from equipo order by idequipo desc ");
        
        return view('alquiler.operaciones.alquiler.formnuevoalquiler')
               ->with("equipo",$equipo)  ;
    } 


    public function guardaralquiler(Request $request){

        header('Content-Type: application/json');
        date_default_timezone_set("America/Lima");

        $data=$request->all();
        $idequipo=$data["idequipo2"]; 
        $entrega=$data["entrega"]; 
        $fechaalquiler=$data["fechaalquiler"]; 
        $fechaentrega=$data["fechaentrega"];  
        $montopago=$data["montopagoh"]; 
        $montoadelanto=$data["montoadelanto"]; 
        $dias  = $data["dias"];
        $cantdias = count(explode(",", $dias));
        $fechareg=date('Y-m-d');
        /*for ($i=0; $i < ; $i++) { 
          # code...
        }
        echo $porciones[0]; // porción1
        echo $porciones[1];*/

        $result = DB::insert("INSERT INTO alquiler(idequipo,entrega,fechaalquiler,fechaentrega,totaldias,dias,montopago,montoadelanto) VALUES(?,?,?,?,?,?,?,?)", [$idequipo,$entrega,$fechaalquiler,$fechaentrega,$cantdias,$dias,$montopago,$montoadelanto]);

        if ($result) {

            $idalquilerult=DB::select("SELECT idalquiler from alquiler order by idalquiler desc ");
            $total=$montopago+$montoadelanto;
            DB::insert("INSERT INTO cabadelanto(idalquiler,total,fechareg) VALUES(?,?,?)", [$idalquilerult[0]->idalquiler,$total,$fechareg]);
            $idadelantoult=DB::select("SELECT idadelanto from cabadelanto order by idadelanto desc ");
            DB::insert("INSERT INTO detadelanto(idadelanto,fechareg,monto) VALUES(?,?,?)", [$idadelantoult[0]->idadelanto,$fechareg,$montoadelanto]);
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
    }

     function equipover(Request $request) {
        header('Content-Type: application/json');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $equipo=DB::select("select e.monto
                            from equipo as e
                            where e.idequipo=".$value." ") ; 
        if(count($equipo)>0){
        $output1 = ' <input type="text" id="montopago" class="form-control input-sm" name="montopago" value="' . $equipo[0]->monto.'" placeholder="monto a pagar..."  disabled >
                    <input type="hidden" id="montopagoh" class="form-control input-sm" name="montopagoh" placeholder="monto a pagar..." value="' . $equipo[0]->monto.'" >
                    <input type="hidden" id="montopagofijo" class="form-control input-sm" name="montopagofijo" placeholder="monto a pagar..." value="' . $equipo[0]->monto.'">'; 
        $output2 = ' '; 
        }else{
        $output1 = '<input type="text" id="montopago" class="form-control input-sm" name="montopago" placeholder="monto a pagar..."  disabled >'; 
        $output2 = ' '; 
        }
         
            $data = $output1.",".$output2;
            echo $data;
 
    }
    
    public function formeditaralquiler ($id){

        date_default_timezone_set("America/Lima");
         
        $alquiler=DB::select("SELECT a.* , e.monto as montoequipo
                              from alquiler as a
                              inner join equipo as e on (e.idequipo=a.idequipo)
                              where idalquiler=$id ");

        $equipo=DB::select("SELECT *  from equipo order by idequipo desc ");
        return view('alquiler.operaciones.alquiler.formeditaralquiler')
               ->with("alquiler",$alquiler)
               ->with("equipo",$equipo) ;
    }
 

    public function editaralquiler(Request $request){

        header('Content-Type: application/json');
        date_default_timezone_set("America/Lima");

        $data=$request->all();
        $id=$data["id"];
        $idequipo=$data["idequipo"]; 
        $idequip = explode(",", $idequipo);
        $idequipo=$idequip[0];
        $entrega=$data["entrega"];  
        $fechaentrega=$data["fechaentrega"];  
        $montopago=$data["montopagoh"]; 
        $montoadelanto=$data["montoadelanto"]; 
        $dias  = $data["dias"];
        $cantdias = count(explode(",", $dias));
        $fechareg=date('Y-m-d');
        /*for ($i=0; $i < ; $i++) { 
          # code...
        }
        echo $porciones[0]; // porción1
        echo $porciones[1];*/
 
          $result = DB::table("alquiler")
                 ->where("idalquiler",$id)
                 ->update([
                    "idequipo" => $idequipo,
                    "entrega" => $entrega, 
                    "fechaentrega" => $fechaentrega,
                    "totaldias" => $cantdias,
                    "dias" => $dias,
                    "montopago" => $montopago,
                    "montoadelanto" => $montoadelanto
                 ]);

        if ($result) {  
            $total=$montopago+$montoadelanto; 
              $result = DB::table("cabadelanto")
                    ->where("idalquiler",$id)
                    ->update([
                        "total" => $total,
                        "fechareg" => $fechareg
                    ]);

            $idadelantoult=DB::select("SELECT iddetadelanto 
                                       from cabadelanto as c
                                       inner join detadelanto as d on (d.idadelanto=c.idadelanto)
                                       where c.idalquiler=$id
                                       order by iddetadelanto asc "); 

              $result = DB::table("detadelanto")
                    ->where("iddetadelanto",$idadelantoult[0]->iddetadelanto)
                    ->update([
                        "monto" => $montoadelanto,
                        "fechareg" => $fechareg
                    ]);

            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
    } 

     public function borraralquiler($id){
        /*$result=DB::table("producto_unidadmedida")
                ->where("idunidadmedida",$id)
                ->delete();*/  

        $result = DB::table("alquiler")
                 ->where("idalquiler",$id)
                 ->update([
                    "estado" => 1 
                 ]);
        $result = DB::table("cabadelanto")
                 ->where("idalquiler",$id)
                 ->update([
                    "estado" => 1 
                 ]);
    } 

    public function reportealquilerrealizados()
    { date_default_timezone_set('America/Lima'); 
        $alquiler =DB::select("SELECT a.*, case when a.estado=0 then 'Activo' else 'Eliminado' end as estado  , e.descripcion as equipo, case when a.estado=0 then 'black' else 'red' end as color 
                              from alquiler as a 
                              inner join equipo as e on (e.idequipo=a.idequipo) 
                              order by idalquiler desc "); 
        return view('alquiler.listados.alquiler.alquilerealizados')
               ->with("alquiler",$alquiler)  ;
    } 

    public function ver_alquiler($id1,$id2,$id3)
    { $where='';
      if($id3!=0){ 
        $where=" and a.entrega like '%$id3%' ";
      }
        $alquiler =DB::select("SELECT a.*, case when a.estado=0 then 'Activo' else 'Eliminado' end as estado  , e.descripcion as equipo, case when a.estado=0 then 'black' else 'red' end as color 
                              from alquiler as a 
                              inner join equipo as e on (e.idequipo=a.idequipo)
                              where a.fechaalquiler between '$id1' and '$id2' $where 
                              order by idalquiler desc "); 
        return view('alquiler.listados.alquiler.ver_alquiler')
               ->with("alquiler",$alquiler)
               ->with("id1",$id1)
               ->with("id2",$id2)
               ->with("id3",$id3);
    }

    public function pdfalquiler()
    { 
        
       $alquiler =DB::select("SELECT a.*, case when a.estado=0 then 'Activo' else 'Eliminado' end as estado  , e.descripcion as equipo, case when a.estado=0 then 'black' else 'red' end as color 
                              from alquiler as a 
                              inner join equipo as e on (e.idequipo=a.idequipo) 
                              order by idalquiler desc "); 

        $pdf= PDF::loadView('alquiler.listados.alquiler.pdfalquiler', compact('alquiler'));

        return $pdf->stream('notapedido.pdf');
 
    }
    public function pdfalquilerver($id1,$id2,$id3)
    { 
        
        $where='';
      if($id3!=0){ 
        $where=" and a.entrega like '%$id3%' ";
      }
        $alquiler =DB::select("SELECT a.*, case when a.estado=0 then 'Activo' else 'Eliminado' end as estado  , e.descripcion as equipo, case when a.estado=0 then 'black' else 'red' end as color 
                              from alquiler as a 
                              inner join equipo as e on (e.idequipo=a.idequipo)
                              where a.fechaalquiler between '$id1' and '$id2' $where 
                              order by idalquiler desc "); 

        $pdf= PDF::loadView('alquiler.listados.alquiler.pdfalquiler', compact('alquiler'));

        return $pdf->stream('notapedido.pdf');
 
    }

    public function excelalquiler (){  
         
       $alquiler =DB::select("SELECT a.*, case when a.estado=0 then 'Activo' else 'Eliminado' end as estado  , e.descripcion as equipo, case when a.estado=0 then 'black' else 'red' end as color 
                              from alquiler as a 
                              inner join equipo as e on (e.idequipo=a.idequipo) 
                              order by idalquiler desc "); 
        return view('alquiler.listados.alquiler.excelalquiler')
               ->with("alquiler",$alquiler)  ;
    } 
    public function excelalquilerver($id1,$id2,$id3)
    { 
        
        $where='';
      if($id3!=0){ 
        $where=" and a.entrega like '%$id3%' ";
      }
        $alquiler =DB::select("SELECT a.*, case when a.estado=0 then 'Activo' else 'Eliminado' end as estado  , e.descripcion as equipo, case when a.estado=0 then 'black' else 'red' end as color 
                              from alquiler as a 
                              inner join equipo as e on (e.idequipo=a.idequipo)
                              where a.fechaalquiler between '$id1' and '$id2' $where 
                              order by idalquiler desc "); 

        
        return view('alquiler.listados.alquiler.excelalquiler')
               ->with("alquiler",$alquiler)  ;
 
    }
}
