 <script type="text/javascript"> 
      $(document).ready(function(){ 
        $("#BtnSave").click(function(){ 

            var list = 'producto'; 

                var formData = new FormData(document.forms.namedItem("fileinfo")); 

                $.ajax({
                    url: 'guardarproducto',
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
                                text: data[1]
                            })
                        }
                    }
                })

           

        });

        $("#BtnSaveEdit").click(function(){ 
            var list = 'register';  
                var formData = new FormData(document.forms.namedItem("fileinfo"));  
                $.ajax({
                    url: 'editar_producto',
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