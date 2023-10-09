 <script type="text/javascript"> 
                    function importe() {                        
                            var a = parseFloat(document.fileinfo.cantidad1.value);
                            var b = parseFloat(document.fileinfo.preciounitario1.value);
                            document.fileinfo.importe1.value = a*b; 
                            var sto= parseFloat($('#stock').val());
                            var cant= parseFloat($('#cantidad1').val());
                            if (sto<cant) {
                            Swal.fire({
                                icon:'error',
                                title: 'Error',
                                target: document.getElementById('con-close-modal'),
                                text: 'Cantidad excede el stock del produto'
                            })
                        }
                    }
      $(document).ready(function(){ 
        $("#BtnSave").click(function(){ 

            var list = 'venta'; 

                var formData = new FormData(document.forms.namedItem("fileinfo")); 

                $.ajax({
                    url: 'guardarventa',
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


        $("#BtnAddEvidencia").click(function(){ 
            if($('#cantidad1').val()!=''){

                        var idproducto = $('#idproducto1').val().split(",")[0];
                        var descripcionpro = $('#idproducto1').val().split(",")[1];
            var html = '<tr>';
            html += '<td><input type="hidden" id="cantidad[]" name="cantidad[]" value="'+ $('#cantidad1').val()+'" class="form-control input-sm">'+ $('#cantidad1').val()+'</td>'; 
            html += '<td><input type="hidden" id="idproducto[]" name="idproducto[]" value="'+ $('#idproducto1').val().split(",")[0]+'" class="form-control input-sm">'+ $('#idproducto1').val().split(",")[1]+' '+ $('#idproducto1').val().split(",")[2]+'</td>'; 
            html += '<td><input type="hidden" id="precioventa[]" name="precioventa[]" value="'+ $('#preciounitario1').val()+'" class="form-control input-sm">'+ $('#preciounitario1').val()+'</td>';  
            html += '<td><input disabled type="hidden" id="importe[]" name="importe[]" value="'+ $('#importe1').val()+'" class="form-control input-sm">'+ $('#importe1').val()+'</td>'; 
            html += '<td><a class="BtnQuitEvidencia btn btn-xs btn-danger"><i class="fa fa-times"></i></a></td>';
            html += '</tr>';
                $('#trabajo1').val('');$('#termino1').val('');$('#inicio1').val('');$('#obra1').val('');
            }else{
                alerta_validacion("Registre como minimo un producto"); 
            }
            $("#TblEvidencia tbody").append(html);
        }); 

        $("#TblEvidencia tbody").on('click', '.BtnQuitEvidencia', function () {
            $(this).parent().parent().remove();
        });

        $("#BtnAddEvidencia2").click(function(){ 
            if($('#cantidad1').val()!=''){

                        var idproducto = $('#idproducto1').val().split(",")[0];
                        var descripcionpro = $('#idproducto1').val().split(",")[1];
            var html = '<tr>';
            html += '<td><input type="hidden" id="cantidad[]" name="cantidad[]" value="'+ $('#cantidad1').val()+'" class="form-control input-sm">'+ $('#cantidad1').val()+'</td>'; 
            html += '<td><input type="hidden" id="idproducto[]" name="idproducto[]" value="'+ $('#idproducto1').val().split(",")[0]+'" class="form-control input-sm">'+ $('#idproducto1').val().split(",")[1]+' / '+ $('#idproducto1').val().split(",")[2]+'</td>'; 
            html += '<td><input type="hidden" id="precioventa[]" name="precioventa[]" value="'+ $('#preciounitario1').val()+'" class="form-control input-sm">'+ $('#preciounitario1').val()+'</td>';  
            html += '<td><input disabled type="hidden" id="importe[]" name="importe[]" value="'+ $('#importe1').val()+'" class="form-control input-sm">'+ $('#importe1').val()+'</td>'; 
            html += '<td><a class="BtnQuitEvidencia2 btn btn-xs btn-danger"><i class="fa fa-times"></i></a></td>';
            html += '</tr>';
                $('#cantidad1').val('');$('#preciounitario1').val('');$('#importe1').val('');
            }else{
                alerta_validacion("Registre como minimo un producto"); 
            }
            $("#TblEvidencia2 tbody").append(html);
        }); 

        $("#TblEvidencia2 tbody").on('click', '.BtnQuitEvidencia2', function () {
            $(this).parent().parent().remove();
        });

    function alerta_validacion(msj){
        Swal.fire({
            icon: "error",
            title: "Error",
            text: msj,
            target: document.getElementById('con-close-modal'),
        })
    };

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


 
        $('.direccion').change(function () { 
            if ($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "direccionproveedorventa",
                    method: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result)
                    {    //alert(result.split(",")[0]);
                        var direccion = result.split(",")[0];
                        var documento = result.split(",")[1];
                        $('#direccion' ).html(direccion); 
                        $('#documento' ).html(documento); 
                    }

                })
            }
        });
 
        $('.correlativo').change(function () { 
            if ($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "correlativoventa",
                    method: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result)
                    {    //alert(result.split(",")[0]);
                        var direccion = result.split(",")[0];
                        var documento = result.split(",")[1];
                        $('#serie1' ).html(direccion); 
                        $('#correlativo1' ).html(documento); 
                    }
 
                })
            }
        });
 
        $('.precio').change(function () { 
            if ($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "precioventa",
                    method: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result)
                    {    //alert(result.split(",")[0]);
                        var precioventa = result.split(",")[0]; 
                        var cantidad = result.split(",")[1]; 
                        $('#precventa1' ).html(precioventa);  
                        $('#stock1' ).html(cantidad);    
                    }

                })
            }
        });


        $("#consultar").click(function(){
            let fechainicio = $("#fechainicio").val();
            if(fechainicio == ""){ alerta_validacion("ingrese fecha inicial"); return false }; 
            let fechafinal = $("#fechafinal").val();
            if(fechafinal == ""){ alerta_validacion("ingrese fecha final"); return false }; 
        })

        $("#consultastock").click(function(){
            let idproducto = $("#idproducto").val();
            if(idproducto == ""){ alerta_validacion("Seleccione el inventario"); return false };   
        })

        function tconsultafalta(arg){

                var id1=$('#fechainicio').val();
                var id2=$('#fechafinal').val(); 
                var url=arg+"/"+id1+"/"+id2;
                $.get(url, function(resul){
                    $("#contenido_capa_edicion").html(resul);
                })

        }
    });
  </script> 