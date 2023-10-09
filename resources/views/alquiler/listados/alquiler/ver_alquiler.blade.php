
                                        <a style="color: white" class="btn btn-success btn-round waves-effect waves-light" href="pdfalquilerver/<?= $id1 ?>/<?= $id2 ?>/<?= $id3 ?>"  target="_blank" ><i data-feather="printer"></i> Imprimir</a>
                                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                        <a style="color: white" class="btn btn-success btn-round waves-effect waves-light" href="excelalquilerver/<?= $id1 ?>/<?= $id2 ?>/<?= $id3 ?>"  target="_blank" ><i data-feather="file-plus"></i> Excel</a>
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

        @extends('layouts.script2')  