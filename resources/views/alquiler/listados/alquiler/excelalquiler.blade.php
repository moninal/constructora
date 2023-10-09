<?php $filename = "alquiler.xls";
 header("Content-Type: application/vnd.ms-excel");
 header("Content-Disposition: attachment; filename=".$filename);
 header("Pragma: no-cache");
 header("Expires: 0"); 
  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table class="ui-widget" border="0" cellspacing="0" id="TbCabecera" width="100%" rules="rows">
    <thead class="ui-widget-header" style="font-size:14px">
      <tr title="Cabecera">
        <th width="16%" colspan="2" rowspan="5" align="left">&nbsp;&nbsp;
          <img src="imagenes/logocompleto.jpeg" height="81"/>
        </th>
        <th width="84%" colspan="8" align="left" scope="col" >CONSULTORA Y CONSTRUCTORA</th>
      </tr>
      <tr title="Cabecera">
        <th scope="col" colspan="8" align="left" >AV. DIRECCION S/N</th>
      </tr> 
    </thead>
</table>
                                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Equipo</th>
                                                    <th>Entrega</th>
                                                    <th>Fecha alquiler</th>
                                                    <th>Fecha entrega</th>
                                                    <th>Dias</th>
                                                    <th>Monto</th>
                                                    <th>Adelanto</th> 
                                                    <th>Estado</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cont=0; foreach ($alquiler as $a ) { ?>
                                                <tr>
                                                    <td><?= $a->equipo ?></td>
                                                    <td><?= $a->entrega ?></td>
                                                    <td><?= $a->fechaalquiler ?></td>
                                                    <td><?= $a->fechaentrega ?></td>
                                                    <td><?= $a->totaldias ?></td>
                                                    <td><?= $a->montopago ?></td>
                                                    <td><?= $a->montoadelanto ?></td> 
                                                    <td style="color: <?= $a->color ?>"><?= $a->estado ?></td>  
                                                </tr> 
                                                <?php } ?> 
                                            </tbody>
                                        </table>
