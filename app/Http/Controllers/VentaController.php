<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VentaController extends Controller
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
    public function venta()
    {
        $compra=DB::select("SELECT c.*, case when c.estado=0 then 'REGISTRADO' when c.estado=1 then 'ELIMINADO' end as estadositu
                              from compra as c ");
        $proveedor=DB::select("SELECT *  from proveedor ");
        $documento=DB::select("SELECT *  from documentos where iddocumento=3");
        $producto=DB::select("SELECT p.*  ,um.abreviatura, case when p.cantidad<=p.stockminimo then 'red' end as style
                                from producto as p
                                inner join producto_unidadmedida as um on um.idunidadmedida=p.idunidadmedida 
                                where p.estado=0 ");
        return view('ventas.operaciones.venta.venta') 
               ->with("compra",$compra)
               ->with("proveedor",$proveedor)
               ->with("documento",$documento)
               ->with("producto",$producto);
    } 

    function direccionproveedorventa(Request $request) {
        header('Content-Type: application/json');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $proveedor=DB::select("select p.direccion,td.abreviatura as tipodocumento,p.nrodocumento
                            from proveedor as p
                            inner join tipodocumento as td on (p.idtipodocumento=td.idtipodocumento)
                            where idproveedor=".$value." ") ; 
        if(count($proveedor)>0){
        $output1 = ' <input disabled type="text" name="direccion" id="direccion" class="block mt-1 w-full form-control"  value="' . $proveedor[0]->direccion . '">'; 
        $output2 = ' <input disabled type="text" name="nrodocumento" id="nrodocumento" class="block mt-1 w-full form-control"  value="' . $proveedor[0]->tipodocumento.' '.$proveedor[0]->nrodocumento. '">'; 
        }else{
        $output1 = ' <input disabled type="text" name="direccion" id="direccion" class="form-control"  >'; 
        $output2 = ' <input disabled type="text" name="nrodocumento" id="nrodocumento" class="form-control"  >'; 
        }
         
            $data = $output1.",".$output2;
            echo $data;
 
    } 

    function precioventa(Request $request) {
        header('Content-Type: application/json');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent'); 
        $porciones = explode(",", $value );
        $idproducto=$porciones[0];

        $producto=DB::select("select p.precioventa, p.cantidad
                            from producto as p 
                            where idproducto=".$idproducto." and estado=0 ") ; 

        if(count($producto)>0){
        $output1 = '<input type="text" id="preciounitario1" name="preciounitario1" class="form-control input-sm" placeholder="precio unitario" onchange="importe()" value="' . $producto[0]->precioventa. '">  '; 
        $output2='<input type="text" id="stock" name="stock" class="form-control input-sm" placeholder="stock" value="' . $producto[0]->cantidad. '" disabled> ';
        }else{
        $output1 = ' <input type="text" id="preciounitario1" name="preciounitario1" class="form-control input-sm" placeholder="precio unitario" onchange="importe()" value="">';  
        $output2='<input type="text" id="cantidad1" name="cantidad1" value="" class="form-control input-sm" placeholder="cantidad" onchange="importe()">';
        }
         
            $data = $output1.','.$output2;
            echo $data;
 
    } 

    function correlativoventa(Request $request) {
        header('Content-Type: application/json');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $documentos=DB::select("select d.serie,d.correlativo
                            from documentos as d 
                            where iddocumento=".$value." ") ; 
        if(count($documentos)>0){
        $output1 = ' <input disabled type="text" name="serie" id="serie" class="block mt-1 w-full form-control"  value="' . $documentos[0]->serie . '"> 
                     <input  type="hidden" name="seriev" id="seriev" class="block mt-1 w-full form-control"  value="' . $documentos[0]->serie . '">'; 
        $output2 = ' <input disabled type="text" name="correlativo" id="correlativo" class="block mt-1 w-full form-control"  value="' . $documentos[0]->correlativo. '">
                    <input  type="hidden" name="correlativov" id="correlativov" class="block mt-1 w-full form-control"  value="' . $documentos[0]->correlativo. '">'; 
        }else{
        $output1 = ' <input disabled type="text" name="serie" id="serie" class="form-control"  >'; 
        $output2 = ' <input disabled type="text" name="correlativo" id="correlativo" class="form-control"  >'; 
        }
         
            $data = $output1.",".$output2;
            echo $data;
 
    } 

    public function guardarventa(Request $request){

        header('Content-Type: application/json');
        date_default_timezone_set("America/Lima");

        $data=$request->all();
        $cliente=$data["cliente"];
        $direccion=$data["direccion"];
        $nrodocumento=$data["nrodocumento"];
        $iddocumento=$data["iddocumento"];
        $serie=$data["seriev"];
        $correlativo=$data["correlativov"];
        $fechareg=$data["fechareg"];
        $fechaserver=date('Y-m-d'); 
        
        ///trabajo realizado
        if(isset($data["idproducto"])){
        $ctra=count($data["idproducto"]);
        }else{
            $ctra=0;
        }
        $ca=0;$im=0;
        for ($i=0; $i <$ctra ; $i++) {  
            $ca=$ca+$data["cantidad"][$i];  
            $im=$im+($data["cantidad"][$i]*$data["precioventa"][$i]);  
        } 

        $result = DB::insert("INSERT INTO venta(cliente,direccion,nrodocumento,iddocumento,serie,correlativo,fechareg,fechaserver,cantidad,total) VALUES(?,?,?,?,?,?,?,?,?,?)", [$cliente,$direccion,$nrodocumento,$iddocumento,$serie,$correlativo,$fechareg,$fechaserver,$ca,$im]);
              
        $venta=DB::select("select max(idventa) as ultimo
                            from venta ") ;       
                            $val=1;       
        for ($i=0; $i <$ctra ; $i++) {  
            $cantidad=$data["cantidad"][$i]; 
            $idproducto=$data["idproducto"][$i];   
            $precioventa=$data["precioventa"][$i];
            $importe=$data["cantidad"][$i]*$data["precioventa"][$i]; 
            $resulttrabajo = DB::insert("INSERT INTO detventa(idventa,cantidad,idproducto,precioventa,importe) VALUES(?,?,?,?,?)", [$venta[0]->ultimo,$cantidad, $idproducto,$precioventa,$importe]);
            $val=0;
        } 
 
        if ($val==0) { 
            
            $documentos=DB::select("select max(correlativo) as ultimo
                            from documentos ") ; 
                    $result = DB::table("documentos")
                            ->where("iddocumento",$iddocumento)
                            ->update([
                                     "correlativo" => $documentos[0]->ultimo+1
                                    ]);

            for ($i=0; $i <$ctra ; $i++) {  
                $cantidad=$data["cantidad"][$i]; 
                $idproducto=$data["idproducto"][$i];   
                $precioventa=$data["precioventa"][$i];
                $importe=$data["cantidad"][$i]*$data["precioventa"][$i]; 
                $cantprod=DB::select("select cantidad
                            from producto where idproducto=".$idproducto." ") ;  
                $result = DB::table("producto")
                        ->where("idproducto",$idproducto)
                        ->update([ 
                            "cantidad" => $cantprod[0]->cantidad-$cantidad
                        ]); 
            }

            $data = array('guardado' => 0 );

        }else{
        $result=DB::table("venta")
                ->where("idventa",$venta[0]->ultimo)
                ->delete();
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
    }
 
    public function anularventa()
    {
        $venta=DB::select("SELECT v.*, case when v.estado=0 then 'REGISTRADO' when v.estado=1 then 'ELIMINADO' end as estadositu,d.abreviado as documento,
                             case when v.estado=0 then 'bg-success' when v.estado=1 then 'bg-danger' end as estadocolor
                              from venta as v
                              inner join documentos as d on d.iddocumento=v.iddocumento "); 
        return view('ventas.operaciones.anularventa.anularventa') 
               ->with("venta",$venta);
    } 

    public function borrar_venta($id){
        /*$result=DB::table("producto_unidadmedida")
                ->where("idunidadmedida",$id)
                ->delete();*/ 
        $detventa=DB::select("select idventa,cantidad,idproducto
                            from detventa as dc
                            where dc.idventa=".$id." ") ;  
        foreach ($detventa as $dc) {
            $cantidadprod=DB::select("select cantidad
                            from producto as p
                            where p.idproducto=".$dc->idproducto." ") ;  
            DB::table("producto")
                 ->where("idproducto",$dc->idproducto)
                 ->update([
                    "cantidad" => $cantidadprod[0]->cantidad+$dc->cantidad
                 ]);
        } 

        $result = DB::table("venta")
                 ->where("idventa",$id)
                 ->update([
                    "estado" => 1 
                 ]);
    }

     public function ver_venta ($id){  
        $venta=DB::select("SELECT v.*, case when v.estado=0 then 'REGISTRADO' when v.estado=1 then 'ELIMINADO' end as estadositu,d.abreviado as documento,
                             case when v.estado=0 then 'bg-success' when v.estado=1 then 'bg-danger' end as estadocolor
                              from venta as v
                              inner join documentos as d on d.iddocumento=v.iddocumento 
                              where v.idventa=".$id." ");
        $ventadetalle=DB::select("SELECT det.*, p.descripcion as producto
                              from detventa as det 
                              inner join producto as p on p.idproducto=det.idproducto
                              where det.idventa=".$id." ");

        return view('ventas.operaciones.anularventa.verventa')
               ->with("venta",$venta)
               ->with("ventadetalle",$ventadetalle);
    } 

}
