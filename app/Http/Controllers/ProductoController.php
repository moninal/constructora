<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductoController extends Controller
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
    public function producto()
    {
        $producto=DB::select("SELECT p.* , um.descripcion as unidadmedida, case when p.estado=0 then 'ACTIVO' when p.estado=1 then 'INACTIVO' end situestado
                              from producto as p
                              inner join producto_unidadmedida as um on um.idunidadmedida=p.idunidadmedida ");
        return view('compras.catalogo.producto.producto') 
               ->with("producto",$producto);
    } 

    public function form_nuevo_producto()
    { 
        $unidadmedida=DB::select("SELECT *  from producto_unidadmedida ");
        return view('compras.catalogo.producto.form_nuevo_producto') 
               ->with("unidadmedida",$unidadmedida);
    }

    public function guardarproducto(Request $request){

        header('Content-Type: application/json');
        date_default_timezone_set("America/Lima");

        $data=$request->all();
        $descripcion=$data["descripcion"];
        $idunidadmedida=$data["idunidadmedida"];
        $cantidad=$data["cantidad"];
        $preciounitario=$data["preciounitario"];
        $precioventa=$data["precioventa"]; 
        $ubicacion=$data["ubicacion"];
        $stockminimo=$data["stockminimo"]; 
 
        $result = DB::insert("INSERT INTO producto(descripcion,idunidadmedida,cantidad,preciounitario,precioventa,ubicacion,stockminimo) VALUES(?,?,?,?,?,?,?)", [$descripcion,$idunidadmedida,$cantidad,$preciounitario,$precioventa,$ubicacion,$stockminimo]);
        if ($result) {
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
    }
 
    
    public function form_editarproducto ($id){

        $producto=DB::table("producto")
                  ->where("idproducto",$id)
                  ->get(); 
        $unidadmedida=DB::select("SELECT *  from producto_unidadmedida ");
        return view('compras.catalogo.producto.form_editarproducto')
               ->with("producto",$producto) 
               ->with("unidadmedida",$unidadmedida) ;
    }

    public function editar_producto(Request $request){

        header('Content-Type: application/json');

        $data=$request->all();
        $idproducto=$data["id"];
        $idunidadmedida=$data["idunidadmedida"];
        $descripcion=$data["descripcion"];
        $cantidad=$data["cantidad"]; 
        $preciounitario=$data["preciounitario"]; 
        $precioventa=$data["precioventa"]; 
        $estado=$data["estado"]; 
        $ubicacion=$data["ubicacion"]; 
        $stockminimo=$data["stockminimo"]; 

        $result = DB::table("producto")
                 ->where("idproducto",$idproducto)
                 ->update([
                    "idunidadmedida" => $idunidadmedida,
                    "descripcion" => $descripcion,
                    "cantidad" => $cantidad,
                    "preciounitario" => $preciounitario,
                    "precioventa" => $precioventa,
                    "estado" => $estado,
                    "ubicacion" => $ubicacion,
                    "stockminimo" => $stockminimo 
                 ]);

        if ($result) {
            $data = array('guardado' => 0 );
        }else{
            $data = array('guardado' => 1 );
        }

        echo json_encode($data, JSON_FORCE_OBJECT);
   
    }

    public function borrar_producto($id){
        /*$result=DB::table("producto_unidadmedida")
                ->where("idunidadmedida",$id)
                ->delete();*/ 
        $result = DB::table("producto")
                 ->where("idproducto",$id)
                 ->update([
                    "estado" => 1 
                 ]);
    }
}
