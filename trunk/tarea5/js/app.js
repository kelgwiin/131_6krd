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
	
	//Envía una petición ajax al servidor para eliminar	los contactos
	
	$("button#bt_delete").on('click',function(){
		
		var params = "",checkboxs;
		
		checkboxs = $(":checked");
		longitud = checkboxs.length;
		nombres = new Array();
		indices_padres = new Array();
		
		if(longitud > 0){
			checkboxs.each(				
				function(){
					nombres.push($(this).attr('name'))
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
			
			//se envía la info al servidor para eliminar
			$.post("eliminar_contactos.php",params,
				function(data){
					alert(data);
				}
			);
		}else{
			alert('Debe seleccionar un contacto para eliminarlo');
		}
		
	});	
	
	//File: add.php, validaciones para guardar contacto
	$('button#bt_save').on('click',function(){
		nombre = $('input#nombre').val();
		apellido = $('input#apellido').val();
		tlf = $('input#tlf').val();
		
		e_civil = $('input#e_civil').val();
		sexo = $('select#sex').val();
		pais = $('input#pais').val();
		direccion = $('textarea').val();
		
		
		//validar: nombre,apellido, tlf
		if(nombre.length >0  && apellido.length > 0 && tlf.length > 0 
		 && isNumber(tlf) ){
			alert('se puede guardar');
			//Procesar llamada al servidor
			
			$('span#error_camposObligatorios').hide();
		}else{
			$('span#error_camposObligatorios').show();
		}
	});
	
	//File: contact.php, validaciones de información para contactar a la empresa
	$('button#bt_contactar').on('click',function(){
		nombre = $('input#name').val();
		email = $('input#email').val();
		msj = $('textarea#message').val();
		web = $('input#web').val();
		
		//campos obligatorios: nombre,email y msj
		if(nombre.length > 0 && email.length > 0 && msj.length > 0
		 && isValidEmail(email)){
		
			$('span#error_camposObligatorios').hide();
		}else{
			$('span#error_camposObligatorios').show();
		}
	});
	
	
	 

}); //End-of: Funcion ready

function isNumber(num){
	
	return true;
}

function isValidEmail(email){
	return true;
}
/**
function pao(){
	$("li").text("Gabriel de Parra");
}

function gabi(){
	$(".cambiar").text("aja te cambieeeee por gabi");
}

//agregar
//~ function add(){
//~ $(document).ready(function(){
	//~ var item = $('<li><i>item</i></li>')
	//~ $('#contactos').append(item);
//~ });
//~ 
//~ }

//Otra forma de agregar
*/
