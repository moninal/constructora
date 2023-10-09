
                                <div class="card">

                            		<div class="col-lg-12">
                                		<div class="card">
                                    		<div class="card-body">
                                        		<h4 class="header-title mb-3" style="font-weight: bold">VENTA <?= $venta[0]->documento.' '.$venta[0]->serie.' - '.$venta[0]->correlativo ?></h4> 
                                        		<h5 class="font-family-primary fw-semibold"><?= $venta[0]->cliente ?></h5> 
                                        		<p class="mb-2"><span class="fw-semibold me-2">Direccion:</span> <?= strtoupper($venta[0]->direccion) ?></p>
                                        		<p class="mb-2"><span class="fw-semibold me-2">Documento:</span> <?= $venta[0]->nrodocumento ?></p>
                                        		<p class="mb-0"><span class="fw-semibold me-2">Fecha:</span> <?= $venta[0]->fechareg ?></p>
            
                                    		</div>
                                		</div>
                            		</div>
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
                                                	<?php 
                                                	$total=0;
                                                		foreach ($ventadetalle as $vd) { ?>
                                                    <tr>
                                                        <th scope="row"><?= $vd->producto ?></th> 
                                                        <td><?= $vd->cantidad ?></td>
                                                        <td><?= $vd->precioventa ?></td>
                                                        <td><?= $vd->importe ?></td>
                                                    </tr>  
                                                	<?php $total+=$vd->importe; } ?>
                                                    <tr>
                                                        <th scope="row" colspan="3" class="text-end">Sub Total :</th>
                                                        <td><div class="fw-bold"><?= 'S/ '.number_format($total,2) ?></div></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" colspan="3" class="text-end">IGV</th>
                                                        <td>S/ 0.00</td>
                                                    </tr> 
                                                    <tr>
                                                        <th scope="row" colspan="3" class="text-end">Total :</th>
                                                        <td><div class="fw-bold"><?= 'S/ '.number_format($total,2) ?></div></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>