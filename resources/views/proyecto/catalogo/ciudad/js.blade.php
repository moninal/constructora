 <script type="text/javascript"> 

                    $('#idequipo2').select2({
                        tema: 'arranque',
                        dropdownParent: $('#staticBackdrop')
                    });
                    
      $(document).ready(function(){ 
        $("#BtnSave").click(function(){ 

            var list = 'ciudad'; 

                var formData = new FormData(document.forms.namedItem("fileinfo")); 

                $.ajax({
                    url: 'guardarciudad',
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

                    $('#idequipo').select2({
                        tema: 'arranque',
                        dropdownParent: $('#edit-close-modal')
                    });

        $("#BtnSaveEdit").click(function(){ 
            var list = 'ciudad';  
                var formData = new FormData(document.forms.namedItem("fileinfo"));  
                $.ajax({
                    url: 'editarciudad',
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


    });
  </script> 