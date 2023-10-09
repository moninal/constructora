

        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf   
            <div class="card-body">
                <div class="row">
                    <div class="row"> 
                        <div class="col-md-12"> 
                                <label for="field-1" class="form-label">Descripcion </label>
                                <input type="text" id="descripcion" name="descripcion" value="" class="form-control input-sm" placeholder="descripcion..." required autofocus > 
                        </div> 

                        <div class="modal-footer">
                            <button id="BtnSave" class="btn btn-info waves-effect waves-light">Guardar</button>
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        </div> 
                    </div>  
                </div>  <!-- end row -->
            </div> <!-- end card body--> 
        </form> 
        @extends('proyecto.catalogo.actividad.js')  
        @extends('layouts.scriptform') 