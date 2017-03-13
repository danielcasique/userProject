
$(document).ready(function(){

	Carga();
});


function Eliminar(id){

	
	var route = "/usuario/"+id+"";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(msj){
			Carga();
			mensajes(msj,'0');
		}
	});
}
