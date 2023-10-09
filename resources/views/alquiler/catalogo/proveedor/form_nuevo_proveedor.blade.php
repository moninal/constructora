
  @extends('compras.catalogo.producto.link') 
        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf
            <div  class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="field-1" class="form-label">Nombre</label>
                        <input id="nombre" class="block mt-1 w-full form-control"  type="text" name="nombre" :value="old('nombre')" required autofocus >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="field-1" class="form-label">Direccion</label>
                        <input id="direccion" class="block mt-1 w-full form-control"  type="text" name="direccion" :value="old('direccion')" required autofocus >
                    </div>
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Tipo documento</label> <br/>
                        <select style="z-index:95000" class="block mt-1 w-full form-control selectize-select"  id="idtipodocumento" name="idtipodocumento">
                            <?php foreach ($tipodocumento as $td ) {  ?>
                                <option value="<?= $td->idtipodocumento ?>"><?= $td->abreviatura ?></option>
                            <?php } ?> 
                        </select> 
                </div>
                <div class="col-lg-6"> 
                        <label class="form-label">Nro. documento</label>
                        <input id="nrodocumento" class="block mt-1 w-full form-control"  type="number" name="nrodocumento" :value="old('nrodocumento')" required autofocus > 
                </div> 
            </div> 
            <div class="modal-footer">
                <button   id="BtnSave" class="btn btn-info waves-effect waves-light">Guardar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </form> 
  @extends('compras.catalogo.proveedor.js') 
  @extends('compras.catalogo.producto.script') 