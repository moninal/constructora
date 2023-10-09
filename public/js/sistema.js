
function form_nuevo(arg){
	var url=arg;

		//$("#contenido_capa_edicion").html($(""))
		$.get(url, function(resul){
			$("#contenido_capa_edicion").html(resul);
		})

}


function form_editar(arg,arg2){ 

	var url=arg+"/"+arg2+"";

	$.get(url, function(resul){
		$("#contenido_capa_edicion2").html(resul);
	})

}

function ver(arg,arg2){ 

	var url=arg+"/"+arg2+"";
	
	$.get(url, function(resul){
		$("#contenido_capa_edicion3").html(resul);
	})

}

function borrar(arg,arg2,arg3){ 

	Swal.fire({
		title: '¿Estás seguro?',
		text: "¿Realmente deseas eliminar este registro?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Eliminar',
		target: document.getElementById('borrar-close-modal'),
	}).then((result) => {
		if (result.value) {
			Swal.fire({
				icon: 'success',
                title: 'Eliminacion satisfactoria',
                showConfirmButton:false,
                timer: 1000,
                target: document.getElementById('borrar-close-modal'),
                onClose: () => {
                	var url=arg+"/"+arg3+"";
                	$.get(url,function(resul){
                		window.location=arg2;
                	})
                }
			})
		}else{
			$("#borrar-close-modal").modal('hide');
		} 
	})
}

function consultatres(arg){

		var id1=$('#uno').val();
		var id2=$('#dos').val(); 
		var id3=$('#tres').val(); 
	    var url=arg+"/"+id1+"/"+id2+"/"+id3;
		$.get(url, function(resul){
			$("#contenido_capa_edicion").html(resul);
		})

}

function tconsultafalta(arg){

		var id1=$('#fechainicio').val();
		var id2=$('#fechafinal').val(); 
	    var url=arg+"/"+id1+"/"+id2;
		$.get(url, function(resul){
			$("#contenido_capa_edicion").html(resul);
		})

}
function consultas_c(arg){

		var id=$('#buscar_carta').val();
		if(id==''){
         alert('Ingrese carta');
		}
	    var url=arg+"/"+id;
		$.get(url, function(resul){
			$("#contenido_capa_edicion").html(resul);
		})

}
function consultas_m(arg){

		var id=$('#buscar_emisor').val();
		if(id==''){
         alert('Ingrese emisor');
		}
	    var url=arg+"/"+id;
		$.get(url, function(resul){
			$("#contenido_capa_edicion").html(resul);
		})

}

function actualizar(arg,arg2){
	var arg3;
	arg3=$('input:checkbox[name=check]:checked').val();

	Swal.fire({
		title: '¿Desea Actualizar?',
		text: "¿Realmente deseas actualizar los registros?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, actualizar',
		target: document.getElementById('myModal'),
	}).then((result) => {
		if (result.value) {
			Swal.fire({
				icon: 'success',
                title: 'Actualizacion de registros satisfactoria',
                showConfirmButton:false,
                timer: 1000,
                target: document.getElementById('myModal'),
                onClose: () => {
                	var url=arg;
                	$.get(url,function(resul){
                		window.location=arg2;
                	})
                }
			})
		}
	})
}