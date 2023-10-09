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

            var entre = parseFloat(document.fileinfo.entregan.value);
            var ab = parseFloat(document.fileinfo.abonar1.value);
            var abalq = parseFloat(document.fileinfo.abonoalquiler.value);

            var html = '<tr>';
            html += '<td><input type="hidden" class="suma" id="abonar[]" name="abonar[]" value="'+ $('#abonar1').val()+'" class="form-control input-sm">'+ $('#abonar1').val()+'</td>'; 
            html += '<td><input type="hidden" id="fecharegn[]" name="fecharegn[]" value="'+ $('#fechareg2').val()+'" class="form-control input-sm">'+ $('#fechareg2').val()+'</td>'; 
            html += '<td>';  
            html += '<a class="BtnQuitEvidencia2 btn btn-xs btn-danger"><i class="fa fa-times"></i></a></td>';
            html += '</tr>';

            if($('#abonar1').val()!='' ){  
                if(Number($('#abonar1').val())<= Number($('#entregan').val())){ 
 
                                var abt=entre-ab;
                                var abaa=abalq+ab;
                                document.fileinfo.entregan.value = abt;  
                                document.fileinfo.entregann.value = abt;
                                document.fileinfo.abonoalquiler.value = abaa;   

                    $("#TblEvidencia2 tbody").append(html);
                    $('#abonar1').val('');  
                }else{ alerta_validacion("Monto ingresado es mayor a la deuda"); }
            }else{
                alerta_validacion("Monto ingresado es vacio"); 
            }
        }); 
        $("#TblEvidencia2 tbody").on('click', '.BtnQuitEvidencia2', function () {  

             const cantidad_ingreso = document.querySelectorAll( 'input[name="abonar[]"]'  );
              var total1=0;
                cantidad_ingreso.forEach((elemento) => { 
                total1 +=parseInt(elemento.value); 
                });

            $(this).parent().parent().remove();

             const cantidad_ingreso2 = document.querySelectorAll( 'input[name="abonar[]"]'  );
              var total2=0;
                cantidad_ingreso2.forEach((elemento) => { 
                total2 +=parseInt(elemento.value); 
                });
               var totalt=total1-total2;
            var entre = parseFloat(document.fileinfo.entregan.value); 
            var abalq = parseFloat(document.fileinfo.abonoalquiler.value);
                document.fileinfo.abonoalquiler.value = abalq-totalt; 
                document.fileinfo.entregan.value = entre+totalt; 
                document.fileinfo.entregann.value = entre+totalt; 
  
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
            var list = 'adelanto';  
                var formData = new FormData(document.forms.namedItem("fileinfo"));  
                $.ajax({
                    url: 'editaradelanto',
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