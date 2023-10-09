<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReporteController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    } 
 
    public function reporteventas()
    {
        return view('ventas.listados.ventasfechas');
    } 
    public function ver_ventafecha($id1,$id2)
    {  
        $venta=DB::select("SELECT p.descripcion as producto,sum( d.cantidad) as cantidad, sum(d.precioventa) as precioventa,sum( d.importe ) as importe
                              from venta as v
                              inner join detventa as d on (v.idventa=d.idventa)
                              inner join producto as p on (p.idproducto=d.idproducto)
                              where v.fechareg between '".$id1."' and '".$id2."' and v.estado=0
                              group by p.descripcion ");
        return view('ventas.listados.ver_ventafecha')
               ->with("venta",$venta);
    } 
    public function reporteinventario()
    {
        $producto=DB::select("SELECT p.descripcion as producto, pum.abreviatura, p.idproducto
                              from  producto as p 
                              inner join producto_unidadmedida as pum on (p.idunidadmedida=pum.idunidadmedida)
                              where  p.estado=0 ");
        return view('compras.listados.stockproducto')
               ->with("producto",$producto);
    } 
    public function ver_stockproducto($id1)
    {   
        $producto=DB::select("SELECT p.*
                              from  producto as p  
                              where  p.estado=0 and p.idproducto= ".$id1." ");
        return view('compras.listados.ver_stockproducto')
               ->with("producto",$producto);
    }
 
}
