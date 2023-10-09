<?php

namespace App\Exports;


use DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AlquilerExport implements FromView, ShouldAutoSize
{
	private $id;
	private $id2;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $id,string $id2) 
    {
        $this->id = $id; // asignas el valor inyectado a la propiedad
        $this->id2 = $id2; // asignas el valor inyectado a la propiedad
    }

    public function view(): View
    {
        return view('alquiler.listados.alquiler.excelalquiler') ;
    }

}
