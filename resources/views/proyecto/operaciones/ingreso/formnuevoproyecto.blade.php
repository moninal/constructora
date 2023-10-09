

        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf   
            <div class="card-body">
                <div class="row">
                    <div class="row"> 

                            <div class="col-xl-12"> 
                                    <div class="card-body"> 
        
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a href="#home" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                                    Datos
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#profile" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                                    Detalle de Actividad
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                                    Detalle de Avance
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">
                                                
                                                <div class="col-md-12"> 
                                                        <label for="field-1" class="form-label">Propietario </label>
                                                        <input type="text" id="propietario" name="propietario" value="" class="form-control input-sm" placeholder="propietario..." required autofocus > 
                                                </div>
                                                <div class="col-md-12"> 
                                                        <label for="field-1" class="form-label">Ciudad</label> 
                                                    <div class="mb-3">
                                                        <select style="width: 100%" class="block mt-1 w-full form-control" data-toggle="select2"  id="idciudad1" name="idciudad" required autofocus> 
                                                                <option value="">Seleccione ciudad...</option>
                                                            <?php foreach ($ciudad as $c ) {  ?> 
                                                                <option value="<?= $c->idciudad ?>"><?= $c->descripcion ?></option>
                                                            <?php } ?> 
                                                        </select>  
                                                    </div>
                                                </div>
                                                <div class="col-md-12"> 
                                                    <label for="field-1" class="form-label">Actividad</label> 
                                                    <a id="BtnAddActividad" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a> </label>
                                                    <div class="mb-3">
                                                        <select style="width: 100%"  class="block mt-1 w-full form-control" data-toggle="select2"  id="idactividad1" name="idactividad" required autofocus> 
                                                                <option value="">Seleccione actividad...</option>
                                                            <?php foreach ($actividad as $a ) {  ?> 
                                                                <option value="<?= $a->idactividad.','.$a->descripcion ?>"><?= $a->descripcion ?></option>
                                                            <?php } ?> 
                                                        </select>  
                                                    </div>
                                                </div> 
                                                <div class="col-md-12"> 
 
                                                    <div class="table-responsive">
                                                        <table id="TblActividad" class="table table-bordered table-centered mb-0"> 
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>Descripcion</th>   
                                                                    <th>#</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>       
                                                            </tbody>
                                                        </table>
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="tab-pane show" id="profile">
                                                <textarea class="form-control" id="detalleactividad" name="detalleactividad" 
                                                    rows="15"></textarea>
                                            </div>
                                            <div class="tab-pane" id="messages"> 
                                                <textarea class="form-control" id="detalleavance" name="detalleavance" 
                                                    rows="15"></textarea>
                                            </div>
                                        </div>
                                    </div> 
                            </div> <!-- end col -->

                        <div class="modal-footer">
                            <a id="BtnSave" class="btn btn-info waves-effect waves-light">Guardar</a>
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        </div> 
                    </div>  
                </div>  <!-- end row -->
            </div> <!-- end card body--> 
        </form> 
        @extends('proyecto.operaciones.ingreso.js')  
        @extends('layouts.scriptform') 