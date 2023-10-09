
  @extends('compras.catalogo.producto.link') 
        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf
            <div  class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="field-1" class="form-label">Descripcion</label>
                        <input id="descripcion" class="block mt-1 w-full form-control"  type="text" name="descripcion" :value="old('descripcion')" required autofocus >
                    </div>
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Unidad de medida</label> <br/>
                        <select style="z-index:95000" class="block mt-1 w-full form-control selectize-select"  id="idunidadmedida" name="idunidadmedida">
                            <?php foreach ($unidadmedida as $um ) {  ?>
                                <option value="<?= $um->idunidadmedida ?>"><?= $um->descripcion ?></option>
                            <?php } ?> 
                        </select> 
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Cantidad</label>
                        <input id="cantidad" class="block mt-1 w-full form-control"  type="decimal" name="cantidad" :value="old('descripcion')" required autofocus > 
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Precio unitario</label>
                        <input id="preciounitario" class="block mt-1 w-full form-control"  type="decimal" name="preciounitario" :value="old('preciounitario')" required autofocus > 
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Precio venta</label>
                        <input id="precioventa" class="block mt-1 w-full form-control"  type="decimal" name="precioventa" :value="old('precioventa')" required autofocus > 
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Stock minimo</label>
                        <input id="stockminimo" class="block mt-1 w-full form-control"  type="decimal" name="stockminimo" :value="old('stockminimo')" required autofocus > 
                </div>
                <div class="col-lg-12"> 
                        <label class="form-label">Ubicacion</label>
                        <input id="ubicacion" class="block mt-1 w-full form-control"  type="text" name="ubicacion" :value="old('ubicacion')"  > 
                </div>
            </div> 
            <div class="modal-footer">
                <button   id="BtnSave" class="btn btn-info waves-effect waves-light">Guardar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </form> 
  @extends('compras.catalogo.producto.js') 
  @extends('compras.catalogo.producto.script') 