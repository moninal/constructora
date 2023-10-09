

        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf   
            <input type="hidden" id="id" name="id" value="<?= $ciudad[0]->idciudad ?>">
            <div class="card-body">
                <div class="row">
                    <div class="row"> 
                        <div class="col-md-12"> 
                                <label for="field-1" class="form-label">Descripcion </label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control input-sm"  required autofocus value="<?=  $ciudad[0]->descripcion ?>"> 
                        </div>
                        
                        <div class="col-md-6"> 
                                <label for="field-1" class="form-label">Estado</label> 
                                <select class="block mt-1 w-full form-control" style="cursor: pointer"  id="estado" name="estado" required autofocus> 
                                        <option value="">Seleccione estado...</option>
                                    <?php $selected1='';$selected2='';
                                            if($ciudad[0]->estado==0){$selected1='selected';$selected2='';}else{$selected1='';$selected2='selected';} ?> 
                                        <option <?= $selected1; ?> value="0"><?= 'ACTIVO' ?></option> 
                                        <option <?= $selected2; ?> value="1"><?= 'INACTIVO' ?></option> 
                                </select>  
                        </div> 

                        <div class="modal-footer">
                            <a id="BtnSaveEdit" class="btn btn-info waves-effect waves-light">Guardar</a>
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        </div> 
                    </div>  
                </div>  <!-- end row -->
            </div> <!-- end card body--> 
        </form> 
        @extends('proyecto.catalogo.ciudad.js')  
        @extends('layouts.scriptform') 