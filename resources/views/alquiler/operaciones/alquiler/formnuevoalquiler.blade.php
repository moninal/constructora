

        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf   
            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <div class="col-md-6"> 
                                <label for="field-1" class="form-label">Equipo</label> 

                                <select class="block mt-1 w-full form-control equipo" data-toggle="select2"  id="idequipo2" name="idequipo2" required autofocus> 
                                        <option value="">Seleccione equipo...</option>
                                    <?php foreach ($equipo as $e ) {  ?> 
                                        <option value="<?= $e->idequipo ?>"><?= $e->descripcion ?></option>
                                    <?php } ?> 
                                </select>  
                        </div>
                        <div class="col-md-6"> 
                                <label for="field-1" class="form-label">Entrega </label>
                                <input type="text" id="entrega" name="entrega" value="" class="form-control input-sm" placeholder="se entrega a: ..." required autofocus > 
                        </div>
                        <div class="col-md-3"> 
                                <label for="field-1" class="form-label">Fecha de Alquiler </label>
                                <input type="date" id="fechaalquiler" class="form-control input-sm" name="fechaalquiler"  value="<?php echo date("Y-m-d");?>"  required autofocus>        
                        </div>
                        <div class="col-md-3"> 
                                <label for="field-1" class="form-label">Fecha de Entrega </label>
                                <input type="date" id="fechaentrega" class="form-control input-sm" name="fechaentrega"  required autofocus> 
                        </div>
                        <div class="col-md-2"> 
                                <label for="field-1" class="form-label">Total dias </label>
                                <input type="text" id="totaldias" class="form-control input-sm" name="totaldias" placeholder="dias.."  disabled>   
                        </div>
                        <div class="col-md-2"> 
                                <label for="field-1" class="form-label">Monto a pagar </label>
                            <div id="equipomontopagover">
                                <input type="text" id="montopago" class="form-control input-sm" name="montopago" placeholder="monto a pagar..."  disabled>   
                                <input type="hidden" id="montopagoh" class="form-control input-sm" name="montopagoh" placeholder="monto a pagar..." >
                                <input type="hidden" id="montopagofijo" class="form-control input-sm" name="montopagofijo" placeholder="monto a pagar..." >
                            </div> 
                        </div>
                        <div class="col-md-2"> 
                                <label for="field-1" class="form-label">Adelanto </label>
                                <input type="text" id="montoadelanto" class="form-control input-sm" name="montoadelanto" placeholder="adelanto..."  required autofocus onchange="adelanto()">      
                        </div>
                        <div class="col-md-12"> 
                                <label for="field-1" class="form-label">Dias </label>
                                <input type="text" id="multiple-datepicker" name="dias" class="form-control" placeholder="Seleccione dias..." onchange="cantidaddias2()">      
                        </div>

                        <div class="modal-footer">
                            <button id="BtnSave" class="btn btn-info waves-effect waves-light">Guardar</button>
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        </div> 
                    </div>  
                </div>  <!-- end row -->
            </div> <!-- end card body--> 
        </form> 
  @extends('alquiler.operaciones.alquiler.js')  
  @extends('alquiler.operaciones.alquiler.script') 