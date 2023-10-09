
        <form enctype="multipart/form-data"   name="fileinfo">
            @csrf
            <input type="hidden" id="id" name="id" value="<?= $equipo[0]->idequipo ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="field-1" class="form-label">Descripcion</label>
                        <input id="descripcion" class="block mt-1 w-full form-control"  type="text" name="descripcion" value="<?= $equipo[0]->descripcion ?>" required autofocus >
                    </div>
                    <div class="mb-3">
                        <label for="field-1" class="form-label">Monto</label>
                        <input id="monto" class="block mt-1 w-full form-control"  type="text" name="monto" value="<?= $equipo[0]->monto ?>" required autofocus >
                    </div>
                </div> 
            </div> 
            <div class="modal-footer">
                <button id="BtnSaveEdit"  class="btn btn-info waves-effect waves-light">Guardar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </form>  
        
    @extends('alquiler.catalogo.equipo.js') 