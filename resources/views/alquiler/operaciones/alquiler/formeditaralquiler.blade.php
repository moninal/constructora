

        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf   
            <input type="hidden" id="id" name="id" value="<?= $alquiler[0]->idalquiler ?>">
            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <div class="col-md-6"> 
                                <label for="field-1" class="form-label">Equipo</label> 

                                <select class="block mt-1 w-full form-control" data-toggle="select2" onchange="cantidaddiasequipo()"  id="idequipo" name="idequipo" required autofocus> 
                                        <option value="">Seleccione equipo...</option>
                                    <?php foreach ($equipo as $e ) {
                                            $selecte='';
                                            if($e->idequipo==$alquiler[0]->idequipo){$selecte='selected';} ?> 
                                        <option <?= $selecte; ?> value="<?= $e->idequipo.','.$e->monto ?>"><?= $e->descripcion ?></option>
                                    <?php } ?> 
                                </select>  
                        </div>
                        <div class="col-md-6"> 
                                <label for="field-1" class="form-label">Entrega </label>
                                <input type="text" id="entrega" name="entrega" class="form-control input-sm" placeholder="se entrega a: ..." required autofocus value="<?=  $alquiler[0]->entrega ?>"> 
                        </div>
                        <div class="col-md-3"> 
                                <label for="field-1" class="form-label">Fecha de Alquiler </label>
                                <input type="date" id="fechaalquiler" class="form-control input-sm" name="fechaalquiler"  value="<?php echo $alquiler[0]->fechaalquiler;?>"  disabled>        
                        </div>
                        <div class="col-md-3"> 
                                <label for="field-1" class="form-label">Fecha de Entrega </label>
                                <input type="date" id="fechaentrega" class="form-control input-sm" name="fechaentrega"  required autofocus value="<?php echo $alquiler[0]->fechaentrega;?>"> 
                        </div>
                        <div class="col-md-2"> 
                                <label for="field-1" class="form-label">Total dias </label>
                                <input type="text" id="totaldias" class="form-control input-sm" name="totaldias" placeholder="dias.."  disabled value="<?=  $alquiler[0]->totaldias ?>">   
                        </div>
                        <div class="col-md-2"> 
                                <label for="field-1" class="form-label">Monto a pagar </label>
                            <div id="equipomontopagover">
                                <input type="text" id="montopago" class="form-control input-sm" name="montopago" placeholder="monto a pagar..."  disabled value="<?=  $alquiler[0]->montopago ?>">   
                                <input type="hidden" id="montopagoh" class="form-control input-sm" name="montopagoh" placeholder="monto a pagar..." value="<?=  $alquiler[0]->montopago ?>" >
                                <input type="hidden" id="montopagofijo" class="form-control input-sm" name="montopagofijo" placeholder="monto a pagar..." value="<?=  $alquiler[0]->montoequipo?>" >
                            </div> 
                        </div>
                        <div class="col-md-2"> 
                                <label for="field-1" class="form-label">Adelanto </label>
                                <input type="text" id="montoadelanto" class="form-control input-sm" name="montoadelanto" placeholder="adelanto..."  required autofocus onchange="adelanto()" value="<?=  $alquiler[0]->montoadelanto ?>">      
                        </div>
                        <div class="col-md-12"> 
                                <label for="field-1" class="form-label">Dias </label>
                                <input type="text" id="multiple-datepicker" name="dias" class="form-control" placeholder="Seleccione dias..." onchange="cantidaddiasedit()" value="<?=  $alquiler[0]->dias ?>">       
                        </div>

                        <div class="modal-footer">
                            <a id="BtnSaveEdit" class="btn btn-info waves-effect waves-light">Guardar</a>
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        </div> 
                    </div>  
                </div>  <!-- end row -->
            </div> <!-- end card body--> 
        </form> 
  @extends('alquiler.operaciones.alquiler.js')  
  @extends('alquiler.operaciones.alquiler.script') 