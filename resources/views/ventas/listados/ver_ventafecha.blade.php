
                                <div class="card"> 
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-centered mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Producto</th> 
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	<?php  $total=0;$tcantidad=0;$tprecioventa=0;
                                                		foreach ($venta as $v) { ?>
                                                    <tr>
                                                        <th scope="row"><?= $v->producto ?></th> 
                                                        <td><?= $v->cantidad ?></td>
                                                        <td><?= $v->precioventa ?></td>
                                                        <td><?= $v->importe ?></td>
                                                    </tr>  
                                                	<?php $total+=$v->importe;$tcantidad+=$v->cantidad;$tprecioventa+=$v->precioventa; } ?> 

                                                    <tr>
                                                        <th scope="row" colspan="1" class="text-end">Total :</th>
                                                        <td><div class="fw-bold"><?= $tcantidad ?></div></td>
                                                        <td><div class="fw-bold"><?= 'S/ '.number_format($tprecioventa,2) ?></div></td>
                                                        <td><div class="fw-bold"><?= 'S/ '.number_format($total,2) ?></div></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>