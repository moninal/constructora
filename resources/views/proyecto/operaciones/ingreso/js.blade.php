 <script type="text/javascript"> 

                
                    $('#idciudad1').select2({
                        tema: 'arranque',
                        dropdownParent: $('#staticBackdrop')
                    });
                    $('#idactividad1').select2({
                        tema: 'arranque',
                        dropdownParent: $('#staticBackdrop')
                    });
      $(document).ready(function(){ 
        $("#BtnSave").click(function(){ 

            var list = 'ingresoproyecto'; 

                var formData = new FormData(document.forms.namedItem("fileinfo")); 

                $.ajax({
                    url: 'guardarproyecto',
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
                                title: 'Datos Guardados',
                                showConfirmButton: false,
                                timer: 1000,
                                target: document.getElementById('con-close-modal'),
                                onClose: () => {
                                    window.location=list;
                                }
                            });
                        }else{
                            Swal.fire({
                                icon:'error',
                                title: 'Error',
                                target: document.getElementById('con-close-modal'),
                                text: 'ERRORR..'
                            })
                        }
                    }
                })

           

        });

         

    function alerta_validacion(msj){
        Swal.fire({
            icon: "error",
            title: "Error",
            text: msj,
            target: document.getElementById('con-close-modal'),
        })
    };

                    $('#idciudad').select2({
                        tema: 'arranque',
                        dropdownParent: $('#edit-close-modal')
                    });
                    $('#idactividad').select2({
                        tema: 'arranque',
                        dropdownParent: $('#edit-close-modal')
                    });

        $("#BtnSaveEdit").click(function(){ 
            var list = 'ingresoproyecto';  
                var formData = new FormData(document.forms.namedItem("fileinfo"));  
                $.ajax({
                    url: 'editarproyecto',
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

           

        });
        $("#BtnAddActividad").click(function(){ 

            if($('#idactividad1').val()!='' ){   
                const myArray = $('#idactividad1').val().split(",");
                let id = myArray[0]
                let descripcion = myArray[1]
                var html = '<tr>';
                html += '<td><input type="hidden" id="idactividadn[]" name="idactividadn[]" value="'+ id+'" class="form-control input-sm">'+ descripcion+'</td>';  
                html += '<td><a class="BtnQuitActividad btn btn-xs btn-danger"><i class="fa fa-times"></i></a></td>';
                html += '</tr>'; 

                    $("#TblActividad tbody").append(html); 
            }else{
                alerta_validacion("Seleccione una actividad"); 
            }
        }); 
        $("#TblActividad tbody").on('click', '.BtnQuitActividad', function () {  
            $(this).parent().parent().remove(); 
        });
        $("#BtnAddActividad1").click(function(){ 

            if($('#idactividad').val()!='' ){   
                const myArray = $('#idactividad').val().split(",");
                let id = myArray[0]
                let descripcion = myArray[1]
                var html = '<tr>';
                html += '<td><input type="hidden" id="idactividadn[]" name="idactividadn[]" value="'+ id+'" class="form-control input-sm">'+ descripcion+'</td>';  
                html += '<td><a class="BtnQuitActividad btn btn-xs btn-danger"><i class="fa fa-times"></i></a></td>';
                html += '</tr>'; 

                    $("#TblActividad tbody").append(html); 
            }else{
                alerta_validacion("Seleccione una actividad"); 
            }
        });  

    });
  </script> 