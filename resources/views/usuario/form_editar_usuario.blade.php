
        <form enctype="multipart/form-data" method="post" name="fileinfo">
            @csrf
            <input type="hidden" id="id" name="id" value="<?= $usuario[0]->id ?>">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label for="field-1" class="form-label">Usuario</label>
                                                                    <input id="name" class="block mt-1 w-full form-control"  type="text" name="name" value="<?= $usuario[0]->name ?>" required autofocus >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label for="field-2" class="form-label">Email</label>
                                                                    <input id="email" class="block mt-1 w-full form-control" type="email" name="email" value="<?= $usuario[0]->email ?>" required >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="field-2" class="form-label">Tipo</label> 
                                                                <select class="block mt-1 w-full form-control"   id="tipo" name="tipo">
                                                                    <?php $res1='';$res2='';
                                                                         if($usuario[0]->tipo==0){$res1='selected';}else{$res2='selected';} ?>
                                                                        <option <?= $res1 ?> value="0">Administrador</option> 
                                                                        <option <?= $res2 ?> value="1">Venta</option> 
                                                                </select> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label for="field-3" class="form-label">Password</label>
                                                                    <input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label for="field-4" class="form-label">Confirme password</label>
                                                                    <input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    <div class="modal-footer">
                                                        <button id="BtnSaveEdit"  class="btn btn-info waves-effect waves-light">Guardar</button>
                                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
        </form> 
        <script type="text/javascript">
            $(document).ready(function(){
        $("#BtnSaveEdit").click(function(){ 
            var list = 'register';  
                var formData = new FormData(document.forms.namedItem("fileinfo"));  
                $.ajax({
                    url: 'editar_usuario',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (data){
                        if (data.guardado==0) { 
                            Swal.fire({
                                icon: 'success',
                                title: 'Datos Actualizados',
                                showConfirmButton: false,
                                timer: 1000,
                                target: document.getElementById('edit-close-modal'),
                                onClose: () => {
                                    window.location=list;
                                }
                            });
                        }else{
                            Swal.fire({
                                icon:'error',
                                title: 'Error',
                                target: document.getElementById('edit-close-modal'),
                                text: 'Error'
                            })
                        }
                    }
                })

           

        })

    });
        </script>