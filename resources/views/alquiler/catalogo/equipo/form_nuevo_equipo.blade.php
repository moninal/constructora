
        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf
                <div class="row">
                    <div class="col-md-12"> 
                            <label for="field-1" class="form-label">Descripcion</label>
                            <input id="descripcion" class="block mt-1 w-full form-control"  type="text" name="descripcion" :value="old('descripcion')" required autofocus > 
                    </div> 
                    <div class="col-md-12"> 
                            <label for="field-1" class="form-label">Monto</label>
                            <input id="monto" class="block mt-1 w-full form-control"  type="text" name="monto" :value="old('descripcion')" required autofocus placeholder="monto del equipo"> 
                    </div> 
                </div> 
                <div class="modal-footer">
                    <button   id="BtnSave" class="btn btn-info waves-effect waves-light">Guardar</button>
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                </div>
        </form>
   
    @extends('alquiler.catalogo.equipo.js') 