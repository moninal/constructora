
                                <div class="card"> 
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-centered mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Producto</th> 
                                                        <th>Cantidad</th>
                                                        <th>Precio Unitario</th>
                                                        <th>Precio Venta</th>
                                                        <th>Ubicacion</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	<?php 
                                                		foreach ($producto as $p) { ?>
                                                    <tr>
                                                        <th scope="row"><?= $p->descripcion ?></th> 
                                                        <td><?= $p->cantidad ?></td> 
                                                        <td><?= $p->preciounitario ?></td>
                                                        <td><?= $p->precioventa ?></td>
                                                        <td><?= $p->ubicacion ?></td>
                                                    </tr>  
                                                	<?php  } ?>  
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>