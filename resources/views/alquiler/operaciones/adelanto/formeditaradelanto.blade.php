

        <form   enctype="multipart/form-data"  name="fileinfo">
            @csrf   
            <input type="hidden" id="id" name="id" value="<?= $adelanto[0]->idadelanto ?>">
            <input type="hidden" id="fechareg1" name="fechareg1" value="<?= $fechareg ?>">
            <input type="hidden" id="fechareg2" name="fechareg2" value="<?= date("Y-m-d") ?>">
            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <div class="col-md-6"> 
                                <label for="field-1" class="form-label">Entrega </label>
                                <input type="text" id="entrega" name="entrega" class="form-control input-sm" placeholder="se entrega a: ..." required autofocus value="<?=  $adelanto[0]->entrega ?>" disabled> 
                        </div>
                        <div class="col-md-6"> 
                                <label for="field-1" class="form-label">Equipo </label>
                                <input type="text" id="entrega" name="entrega" class="form-control input-sm" placeholder="se entrega a: ..." required autofocus value="<?=  $adelanto[0]->equipo ?>" disabled> 
                        </div>
                        <div class="col-md-3"> 
                                <label for="field-1" class="form-label">Fecha del registro </label>
                                <input type="date" id="entrega" name="entrega" class="form-control input-sm" placeholder="se entrega a: ..." required autofocus value="<?=  $adelanto[0]->fechareg ?>" disabled> 
                        </div>
                        <div class="col-md-3"> 
                                <label for="field-1" class="form-label">Total del alquiler </label>
                                <input type="text" id="entrega" name="entrega" class="form-control input-sm" placeholder="se entrega a: ..." required autofocus value="<?=  $adelanto[0]->total ?>" disabled> 
                        </div>
                        <div class="col-md-3"> 
                                <label for="field-1" class="form-label">Abonos del alquiler </label>
                                <input type="text" id="abonoalquiler" name="abonoalquiler" class="form-control input-sm" placeholder="se entrega a: ..." required autofocus value="<?=  $totdetadelanto[0]->totalmonto ?>" disabled> 
                        </div>
                        <div class="col-md-3">  
                                <label for="field-1" class="form-label">Faltante del alquiler </label>
                                <input type="text" id="entregann" name="entregann" class="form-control input-sm" placeholder="se entrega a: ..." required autofocus value="<?=  $adelanto[0]->total- $totdetadelanto[0]->totalmonto ?>" disabled> 
                                <input type="hidden" id="entregan" name="entregan" class="form-control input-sm" placeholder="se entrega a: ..." required autofocus value="<?=  $adelanto[0]->total- $totdetadelanto[0]->totalmonto ?>" >  
                        </div> 
                        <div class="col-md-12"> 
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Glosa </label>
                                <input type="text" id="glosa" name="glosa" class="form-control input-sm" placeholder="glosa ..." value="<?=  $adelanto[0]->glosa ?>"  >  
                            </div>
                        </div> 
                        <div class="col-md-3">  
                                <label for="field-1" class="form-label">Ingresar monto para abonar
                                <a id="BtnAddEvidencia2" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a> </label>
                                <input type="text" id="abonar1" name="abonar1" class="form-control input-sm" placeholder="abonar" required autofocus  >  
                        </div> 
 
                            <div class="col-md-9"> 
 
                                <div class="table-responsive">
                                    <table id="TblEvidencia2" class="table table-bordered table-centered mb-0"> 
                                        <thead class="table-light">
                                            <tr>
                                                <th>Monto</th>  
                                                <th>Fecha</th> 
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php foreach ($detadelanto as $da) {  
                                                if($fecharegval==$da->fechareg)
                                                    {$eli='<a class="BtnQuitEvidencia2 btn btn-xs btn-danger"><i class="fa fa-times"></i></a>';
                                                    $inputm='<input type="hidden" class="suma" id="abonar[]" name="abonar[]" value="'.number_format($da->monto,2).'" class="form-control input-sm">'. number_format($da->monto,2).'';
                                                    $inputf='<input type="hidden" id="fecharegn[]" name="fecharegn[]" value="'.$da->fechareg.'" class="form-control input-sm">'.$da->fechareg.''; }
                                                else{$eli='Cancelado';$inputm=number_format($da->monto,2);$inputf=$da->fechareg;} ?>
                                            <tr>
                                                <td><?= $inputm ?></td> 
                                                <td><?= $inputf ?></td> 
                                                <td><?= $eli ?></td>
                                            </tr> 
                                            <?php   } ?>      
                                        </tbody>
                                    </table>
                                </div> 
                            </div> 
  

                        <div class="modal-footer">
                            <a id="BtnSaveEdit" class="btn btn-info waves-effect waves-light">Guardar</a>
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                        </div> 
                    </div>  
                </div>  <!-- end row -->
            </div> <!-- end card body--> 
        </form> 
  @extends('alquiler.operaciones.adelanto.js')  
  @extends('alquiler.operaciones.adelanto.script') 