$("#registroUsuario").click(function(){
	var name =  $("#name").val();
	var email =  $("#email").val();
	var address = $("#address").val();
	var password =  $("#password").val();
	var state =  $("#state").val();
	var type =  $("#type").val();

	var route = "/usuario";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{name: name, email: email, address: address, password: password,state: state, type: type},

		success:function(msj){
			//$("#msj-success").fadeIn();
			
			mensajes(msj,'1','msj-error','form-errors','msj-success','form-okMessages');
		},
		error:function(msj){
			
			mensajes(msj,'1','msj-error','form-errors','msj-success','form-okMessages');
			//$("#msj-error").fadeIn();
		}
	});
});



var mensajes = function( jqXhr, eval, errorPanelMensaje, formErrorMensaje, okPanelMensaje, formokMessages ) {
	
	
	
	if( jqXhr.status === 401 ){
		//verificar si el usuario esta autenticado
		   // $( location ).prop( 'pathname', 'auth/login' );
    }
	if( jqXhr.status === 422 ) {
		//error de validacion
		$("#"+errorPanelMensaje).fadeIn();

		//procesar error
		var errors = jqXhr.responseJSON; //obtener la data del error

		//construir el mensaje de error
		errorsHtml = '<ul>';

		$.each( errors , function( key, value ) {
			errorsHtml += '<li>' + value[0] + '</li>'; //agregar cada uno de los errores
			
		});
		errorsHtml += '</ul>';
			
		$( '#' + formErrorMensaje ).html( errorsHtml ); //cerrando el mensaje de error

	} 

	if (jqXhr.status === 500) {
		//error de validacion
		$("#" + okPanelMensaje).fadeIn();

		okResponseHtml = '<ul>';
		okResponseHtml += '<li>Registro realizado con exito</li>'; 
		okResponseHtml += '<li>Error al intentar enviar correo de bienvenida</li>'; 
		okResponseHtml += '</ul>';
			
		$( '#' + formokMessages).html( okResponseHtml ); 
	}

	if (jqXhr.status === '200' ) {
		
		$("#" + okPanelMensaje).fadeIn();
		
		okResponseHtml = '<ul>';
		okResponseHtml += '<li>' + jqXhr.menssage + '</li>'; 
		okResponseHtml += '</ul>';
		
		

		$( '#' + formokMessages).html( okResponseHtml ); 

		if(eval == '1'){
			$.ajax({
        		type: "POST",
        		contentType: "application/json; charset=utf-8",
        		url: jqXhr.url_redirect,
       			dataType: "json",
        		data: { message: jqXhr.menssage }, 
        		complete:
        		function () {
            		window.location = '/' + jqXhr.url_redirect;
        		}

			});
		}

	}
};

function Mostrar(id){


	var route = "/usuario/"+id+"/edit";

	$.get(route, function(res){
		$("#name").val(res.name);
		$("#email").val(res.email);
		$("#address").val(res.address);
		$("#password").val(res.password);
		$("#state").val(res.state);
		$("#type").val(res.type);
		$("#id").val(res.id);
	});
}


$("#actualizarUsuario").click(function(){

	var value = $("#id").val();
	var name = $("#name").val();
	var email = $("#email").val();
	var address = $("#address").val();
	var password = $("#password").val();
	var state = $("#state").val();
	var type = $("#type").val();
	var route = "/usuario/"+value+"";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data:{name: name, email: email, address: address, password: password,state: state, type: type},
		success: function(msj){
			Carga();
			$("#myModal").modal('toggle');
			//$("#msj-success").fadeIn();
			
			mensajes(msj,'0','msj-errorDetalle','form-errorsDetalle','msj-success','form-okMessages');
		},
		error:function(msj){
			
			mensajes(msj,'0','msj-errorDetalle','form-errorsDetalle','msj-success','form-okMessages');
			//$("#msj-error").fadeIn();
		}
	});
});

function Carga(){
	var tablaDatos = $("#datos");
	var route = "/usuario";
	$("#datos").empty();

	$.get(route, function(res){
		$(res.users).each(function(key,value){
			tablaDatos.append("<tr><td>"+value.name+"</td>"+
							  "<td>"+value.email+"</td>"+
							  "<td>"+
							  	"<button value="+value.id+" OnClick='Mostrar(this.value);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button>" +
							    "<button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this.value);'>Eliminar</button></td></tr>");
		});
	});
}
