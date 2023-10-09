
  @extends('compras.catalogo.producto.link') 
        <form enctype="multipart/form-data"   name="fileinfo">
            @csrf
            <input type="hidden" id="id" name="id" value="<?= $producto[0]->idproducto ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="field-1" class="form-label">Descripcion</label>
                        <input id="descripcion" class="block mt-1 w-full form-control"  type="text" name="descripcion" value="<?= $producto[0]->descripcion ?>" required autofocus >
                    </div>
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Unidad de medida</label> <br/>
                        <select style="z-index:95000" class="block mt-1 w-full form-control selectize-select"  id="idunidadmedida" name="idunidadmedida">
                            <?php
                                 foreach ($unidadmedida as $um ) {  
                                    $select='';
                                 if($um->idunidadmedida==$producto[0]->idunidadmedida){
                                   $select='selected'; 
                                 } ?>
                                <option <?= $select ?> value="<?= $um->idunidadmedida ?>"><?= $um->descripcion ?></option>
                            <?php } ?> 
                        </select> 
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Cantidad</label>
                        <input id="cantidad" class="block mt-1 w-full form-control"  type="decimal" name="cantidad"  value="<?= $producto[0]->cantidad ?>" required autofocus > 
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Precio unitario</label>
                        <input id="preciounitario" class="block mt-1 w-full form-control"  type="decimal" name="preciounitario" value="<?= $producto[0]->preciounitario ?>" required autofocus > 
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Precio venta</label>
                        <input id="precioventa" class="block mt-1 w-full form-control"  type="decimal" name="precioventa" value="<?= $producto[0]->precioventa ?>" required autofocus > 
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Stock minimo</label>
                        <input id="stockminimo" class="block mt-1 w-full form-control"  type="decimal" name="stockminimo" value="<?= $producto[0]->stockminimo ?>" required autofocus > 
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Estado</label> <br/>
                        <select class="block mt-1 w-full form-control selectize-select"  id="estado" name="estado">
                            <?php  
                                    $select1='';$select2='';$dis='';
                                 if($producto[0]->estado==0){
                                   $select1='selected'; $select2=''; $dis='disabled';
                                 }else{ $select1=''; $select2='selected';$dis='';} ?>
                                <option <?= $select1 ?>  value="0">ACTIVO</option> 
                                <option <?= $select2 ?> value="1">INACTIVO</option> 
                        </select> 
                </div>
                <div class="col-lg-12"> 
                        <label class="form-label">Ubicacion</label>
                        <input id="ubicacion" class="block mt-1 w-full form-control"  type="text" name="ubicacion" value="<?= $producto[0]->ubicacion ?>"  > 
                </div>
            </div> 
            <div class="modal-footer">
                <button id="BtnSaveEdit"  class="btn btn-info waves-effect waves-light">Guardar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </form>  
  @extends('compras.catalogo.producto.js') 
  @extends('compras.catalogo.producto.script') 