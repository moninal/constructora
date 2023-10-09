 <script type="text/javascript"> 

                    
       function cantidaddias2() {                        
                            /*var a = parseFloat(document.fileinfo.cantidad1.value);
                            var b = parseFloat(document.fileinfo.preciounitario1.value);
                            document.fileinfo.importe1.value = a*b; */

                            var dias=$('#multiple-datepicker').val(); 
                            var arrayDeCadenas = dias.split(',').length;
                            document.fileinfo.totaldias.value = arrayDeCadenas; 

                            var mph = parseFloat(document.fileinfo.montopagofijo.value);
                            document.fileinfo.montopago.value = arrayDeCadenas*mph
                            document.fileinfo.montopagoh.value = arrayDeCadenas*mph
                    }
                    
       function cantidaddiasedit() {                         

                            var dias=$('#multiple-datepicker').val(); 
                            var arrayDeCadenas = dias.split(',').length;
                            document.fileinfo.totaldias.value = arrayDeCadenas; 

                            var mph = parseFloat(document.fileinfo.montopagofijo.value);
                            var ad = parseFloat(document.fileinfo.montoadelanto.value);
                            document.fileinfo.montopago.value = (arrayDeCadenas*mph-ad)
                            document.fileinfo.montopagoh.value = (arrayDeCadenas*mph-ad)
                    }

       function cantidaddiasequipo() {                         

                            var idequipomonto = $('#idequipo').val().split(",")[1];
                            var dias=$('#multiple-datepicker').val(); 
                            var arrayDeCadenas = dias.split(',').length;
                            document.fileinfo.totaldias.value = arrayDeCadenas; 

                            var mph = parseFloat(document.fileinfo.montopagofijo.value);
                            var ad = parseFloat(document.fileinfo.montoadelanto.value);
                            document.fileinfo.montopago.value = (arrayDeCadenas*idequipomonto-ad)
                            document.fileinfo.montopagoh.value = (arrayDeCadenas*idequipomonto-ad)
                            document.fileinfo.montopagofijo.value = idequipomonto
                    }

       function adelanto() {                        
                            var a = parseFloat(document.fileinfo.montopagofijo.value);
                            var b = parseFloat(document.fileinfo.montoadelanto.value);
                                if(!b){
                                       b=0;  
                                } 
                                var todias = parseFloat(document.fileinfo.totaldias.value);
                                var a=todias*a;
                                document.fileinfo.montopagoh.value = a; 
                                document.fileinfo.montopago.value = a; 
                            if(a<b){

                                Swal.fire({
                                    icon:'error',
                                    title: 'Error',
                                    target: document.getElementById('con-close-modal'),
                                    text: 'Adelanto es mayor al monto del aquiler'
                                })
                            }else{
                                var result =a-b;
                                document.fileinfo.montopagoh.value = result; 
                                document.fileinfo.montopago.value = result; 
                            }
                    }

                    $('#idequipo2').select2({
                        tema: 'arranque',
                        dropdownParent: $('#staticBackdrop')
                    });
                    
      $(document).ready(function(){ 
        $("#BtnSave").click(function(){ 

            var list = 'alquiler'; 

                var formData = new FormData(document.forms.namedItem("fileinfo")); 

                $.ajax({
                    url: 'guardaralquiler',
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

         $("#BtnAddEvidencia2").click(function(){ 
            if($('#cantidad1').val()!=''){ 
                        var idproducto = $('#idproducto1').val().split(",")[0];
                        var descripcionpro = $('#idproducto1').val().split(",")[1];
            var html = '<tr>';
            html += '<td><input type="hidden" id="idproducto[]" name="idproducto[]" value="'+ $('#idproducto1').val().split(",")[0]+'" class="form-control input-sm">'+ $('#idproducto1').val().split(",")[1]+'</td>'; 
            html += '<td><input type="hidden" id="cantidad[]" name="cantidad[]" value="'+ $('#cantidad1').val()+'" class="form-control input-sm">'+ $('#cantidad1').val()+'</td>'; 
            html += '<td><input type="hidden" id="preciounitario[]" name="preciounitario[]" value="'+ $('#preciounitario1').val()+'" class="form-control input-sm">'+ $('#preciounitario1').val()+'</td>'; 
            html += '<td><input type="hidden" id="precioventa[]" name="precioventa[]" value="'+ $('#precioventa1').val()+'" class="form-control input-sm">'+ $('#precioventa1').val()+'</td>'; 
            html += '<td><input disabled type="hidden" id="importe[]" name="importe[]" value="'+ $('#importe1').val()+'" class="form-control input-sm">'+ $('#importe1').val()+'</td>'; 
            html += '<td class="text-center"><a class="BtnQuitEvidencia2 btn btn-xs btn-danger"><i class="fa fa-times"></i></a></td>';
            html += '</tr>';
                $('#cantidad1').val('');$('#preciounitario1').val('');$('#precioventa1').val('');$('#importe1').val('');
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

                    $('#idequipo').select2({
                        tema: 'arranque',
                        dropdownParent: $('#edit-close-modal')
                    });

        $("#BtnSaveEdit").click(function(){ 
            var list = 'alquiler';  
                var formData = new FormData(document.forms.namedItem("fileinfo"));  
                $.ajax({
                    url: 'editaralquiler',
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


 
        $('.equipo').change(function () { 
            if ($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "equipover",
                    method: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result)
                    {    //alert(result.split(",")[0]);
                        var equipomontopagover = result.split(",")[0]; 
                        $('#equipomontopagover' ).html(equipomontopagover); 
                    }

                })
            }
        });

    });
  </script> 