$(document).ready(function(){
	
	$("#LogoTeam").animate({
		height:'128px',
		width:'128px'
    });
    
	$("#ContenedorMedio").fadeIn(2000);
	
	$('#ContenedorMedio').on('click', '#mas', function(){
		var item = $('<li><i>item</i></li>');
		$('#contactos').append(item);
	});

	$('#contactos').on('click', '.hlt', function(){
		$(this).toggleClass('hightlighted');
	});

	$("input, textarea").focus(function(){
		$(this).css("background-color","#cccccc");
	});
	
	$("input, textarea").blur(function(){
		$(this).css("background-color","#ffffff");
	});
	
	//---------------------------------------------------------------
	//Envía una petición ajax al servidor para eliminar	los contactos
	//---------------------------------------------------------------
	
	$("button#bt_delete").on('click',function(){
		
		var params = "",checkboxs;
		
		checkboxs = $(":checked");
		longitud = checkboxs.length;
		nombres = new Array();
		indices_padres = new Array();
		
		if(longitud > 0 && confirm('¿Está seguro que desea eliminar el(los) contacto(s) ?') ){
			checkboxs.each(				
				function(){
					nombres.push($(this).attr('name'));
					indices_padres.push($(this).parent().index());
				}
			);
		
			//eliminando gráficamente entrada de agenda
			for (i = 0; i < indices_padres.length; i++)
			{
				$("ul#contactos "+"li:eq("+indices_padres[i]+")").remove();
				$("ul#tlf "+"li:eq("+indices_padres[i]+")").remove();
				$("ul#dir "+"li:eq("+indices_padres[i]+")").remove();
			}
			
			
			params = {checked:nombres};
			
			//se envía la info al servidor para eliminar (ajax)
			$.post("index.php/agenda/eliminar",params,
				function(data){
					//No hacer nada porque no se recibe ningún echo
					//de eliminar_contactos.php
				}
			);
		}
		
		if(longitud == 0){
			alert('Debe seleccionar un contacto para eliminarlo');
		}
		
		
	});	
	
	//--------------------------------------------------
	//File: add.php, validaciones para guardar contacto
	//--------------------------------------------------
	
	$('button#bt_save').on('click',function(){
		nombre_ = $('input#nombre').val();
		apellido_ = $('input#apellido').val();
		tlf_ = $('input#tlf').val();
		
		e_civil_ = $('input#e_civil').val();
		sexo_ = $('select#sex').val();
		pais_ = $('input#pais').val();
		direccion_ = $('textarea').val();
		
		es_num = isNumber(tlf_) ;
		
		//validar: nombre,apellido, tlf
		if(nombre_.length >0  && apellido_.length > 0 && tlf_.length > 0 
		 && es_num ){
			//Procesar llamada al servidor
			params = 
			{
				nombre:nombre_,
				apellido:apellido_,
				sexo:sexo_,
				telefono:tlf_,
				edo_civil:e_civil_,
				
				pais:pais_,
				direccion:direccion_
			};
			
			//se envía la info al servidor para eliminar (ajax)
			$.post("index.php/agenda/guardar",params,
				function(data){
					$('div#ContenedorMedio').hide();
					
					$('div#msj h2').text('...' + data);
					$('div#msj').show();
				}
			);
			
			$('span#error_camposObligatorios').hide();
			$('span#noesNumero').hide();
		}else{
			if(!es_num){
				$('span#noesNumero').show();
			}
			$('span#error_camposObligatorios').show();
		}
	});
	
	//------------------------------------------------------------------------------
	//File: contact.php, validaciones de la información para contactar a la empresa
	//------------------------------------------------------------------------------
	
	$('button#bt_contactar').on('click',function(){
		nombre_ = $('input#name').val();
		email_ = $('input#email').val();
		msj_ = $('textarea#message').val();
		web_ = $('input#web').val();
		
		//campos obligatorios: nombre,email y msj
		if(nombre_.length > 0 && email_.length > 0 && msj_.length > 0
		 && isValidEmail(email_)){
			
			//...Guardar información en la bd y desplegar mensaje informativo (ajax)
			
			//preparar parámetros para enviar al post
			params = {
				nombre:nombre_,
				email:email_,
				cuerpo_msj:msj_,
				web:web_
			}
			
			//enviando data al post (ajax)
			$.post('index.php/agenda/guardar_info', params, 
				//recibe info del servidor mediante los echo's
				function(data){
					$('div#ContenedorMedio').hide();
					$('div#msj h2').text(data);
					$('div#msj').show();
					
				}
			);
			
			$('span#error_camposObligatorios').hide();
		}else{
			$('span#error_camposObligatorios').show();
		}
	});	
	 
}); //End-of: Funcion ready

function isNumber(num){
	if(/^([0-9])*$/.test(num) ){
		return true;
	}else{
		return false;
	}
}

function isValidEmail(email){
	//~ if(/^([a-z]||[A-Z])*@([a-z]||[A-Z])*(.([a-z]||[A-Z])*)*$/.test(email) ){
		//~ return true;
	//~ }else{
		//~ return false;
	//~ }
	return true;
}
