
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