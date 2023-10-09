

        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf   
            <input type="hidden" id="id" name="id" value="<?= $actividad[0]->idactividad ?>">
            <div class="card-body">
                <div class="row">
                    <div class="row"> 
                        <div class="col-md-12"> 
                                <label for="field-1" class="form-label">Descripcion </label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control input-sm"  required autofocus value="<?=  $actividad[0]->descripcion ?>"> 
                        </div>

                        <div class="modal-footer">
                            <a id="BtnSaveEdit" class="btn btn-info waves-effect waves-light">Guardar</a>
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        </div> 
                    </div>  
                </div>  <!-- end row -->
            </div> <!-- end card body--> 
        </form> 
        @extends('proyecto.catalogo.actividad.js')  
        @extends('layouts.scriptform') 