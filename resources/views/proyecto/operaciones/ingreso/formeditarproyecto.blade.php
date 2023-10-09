

        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf   
            <input type="hidden" id="id" name="id" value="<?= $proyecto[0]->idproyecto ?>">
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
                                                        <input type="text" id="propietario" name="propietario" value="<?=  $proyecto[0]->propietario ?>" class="form-control input-sm" placeholder="propietario..." required autofocus > 
                                                </div>
                                                <div class="col-md-12"> 
                                                        <label for="field-1" class="form-label">Ciudad</label> 
                                                    <div class="mb-3">
                                                        <select style="width: 100%" class="block mt-1 w-full form-control" data-toggle="select2"  id="idciudad" name="idciudad" required autofocus> 
                                                                <option value="">Seleccione ciudad...</option>
                                                            <?php foreach ($ciudad as $c ) { 
                                                                    $sela='';
                                                                if($c->idciudad==$proyecto[0]->idciudad){$sela='selected';} ?> 
                                                                <option <?= $sela ?> value="<?= $c->idciudad ?>"><?= $c->descripcion ?></option>
                                                            <?php } ?> 
                                                        </select>  
                                                    </div>
                                                </div>
                                                <div class="col-md-12"> 
                                                    <label for="field-1" class="form-label">Actividad</label> 
                                                    <a id="BtnAddActividad1" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a> </label>
                                                    <div class="mb-3">
                                                        <select style="width: 100%"  class="block mt-1 w-full form-control" data-toggle="select2"  id="idactividad" name="idactividad" required autofocus> 
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
                                                                <?php foreach ($detproyecto as $da) {  
                                                                        $eli='<a class="BtnQuitActividad btn btn-xs btn-danger"><i class="fa fa-times"></i></a>';
                                                                        $inputa='<input type="hidden" class="suma" id="idactividadn[]" name="idactividadn[]" value="'.$da->idactividad.'" class="form-control input-sm">'. $da->actividad.'';  ?>
                                                                <tr>
                                                                    <td><?= $inputa ?></td>  
                                                                    <td><?= $eli ?></td>
                                                                </tr> 
                                                                <?php   } ?>        
                                                            </tbody>
                                                        </table>
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="tab-pane show" id="profile">
                                                <textarea class="form-control" id="detalleactividad" name="detalleactividad" 
                                                    rows="15"><?=  $proyecto[0]->detalleactividad ?></textarea>
                                            </div>
                                            <div class="tab-pane" id="messages"> 
                                                <textarea class="form-control" id="detalleavance" name="detalleavance" 
                                                    rows="15"><?=  $proyecto[0]->detalleavance ?></textarea>
                                            </div>
                                        </div>
                                    </div> 
                            </div> <!-- end col -->

                        <div class="modal-footer">
                            <a id="BtnSaveEdit" class="btn btn-info waves-effect waves-light">Guardar</a>
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        </div> 
                    </div>  
                </div>  <!-- end row -->
            </div> <!-- end card body--> 
        </form> 
        @extends('proyecto.operaciones.ingreso.js')  
        @extends('layouts.scriptform') 