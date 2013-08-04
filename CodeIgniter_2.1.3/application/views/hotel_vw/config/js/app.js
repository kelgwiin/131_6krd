//Principal
_main();

function _main(){
	$(document).ready(function(){
		msj_creacion_nuevo_usr();
	
		tabla();
		
		inicio_sesion();
        
		cerrar_sesion();
    
		msj_registro_usr();
		
		msj_error_claves();
	
		existe_usr();
	
		validacion_tarjeta();
	
		guardar_usuario();
	
		//pendiente viejo sin desarrollar mucho
		boton_reservar();
		
	}); //End-of: Funcion ready
	
}//end-of-function: main



/**Configuraciones para el inicio de sesión formateando y escondiendo
* ciertos elementos
*/ 
function config_inicio_sesion(obj){
			$('li#registrarse_div').hide();
			$('li#registrarse').hide();
			$('li#inicio_sesion_div').hide();
			$('li#inicio_sesion').hide();
						
			$('span#nombre_usuario').text(obj.usuario);
			$('li#sesion_iniciada').show();
			$('li#cerrar_sesion_div').show();
			$('li#cerrar_sesion').show();
			
						
			//cargar opciones especiales de admin
			if(obj.rol == "admin"){
				$('li#reservas_admin').show();
				$('li#reservas_admin_div').show();
				$('li#reportes_div').show();
				$('li#reportes').show();
			}else{
				$('li#reservas_estandar_div').show();
				$('li#reservas_estandar').show();
			}
			
			//resetear
			$('input#usuario').val('');
			$('input#clave').val('');
			$('div#error_inicio_sesion').hide();
						
			$('#aviso_inicio_sesion').foundation('reveal', 'open');
		
		}

function msj_creacion_nuevo_usr(){
//mostrar mensaje de creación de nuevo usuario
	
	id_usr = $('div.mostrar_nuevo_usuario').attr('id');
	if(id_usr == 'true'){
		$('#aviso_nuevo_usuario').foundation('reveal', 'open');
	}
	
}

function tabla(){
		//----------------------
		// DataTable
		//----------------------
       var oTable = $('#tb_rsv').dataTable({
             "bJQueryUI": true,
             "sPaginationType": "full_numbers",
             "oLanguage": {
                "sUrl": "application/views/hotel_vw/config/DataTables-1.9.4/languages/datatable.es.txt"
            }
        });
        //Cuando cambia de tamaño
         $(window).bind('resize', function () {
			oTable.fnAdjustColumnSizing();
		} );
        $('#tb_rsv tr').click(function() {
            $(this).toggleClass('row_selected');
        } );
}

function inicio_sesion(){
        //------------------
        //Inicio de Sesion
        //------------------
		$('form#fr_inicio_sesion').on('submit',function(event){
			event.preventDefault();
			
			// store reference to the form
			var $this = $(this);
			// grab the url from the form element
			var url = $this.attr('action');
			
			// enviando en la data del form
			var dataToSend = $this.serialize();
				
			// the callback function that tells us what the server-side process had to say
			var callback = function(data){
					//Ojo la data está formateada en JSON
					obj = data;
					
					if(obj.estatus == "ok"){ // el usuario y contraseña coinciden
						config_inicio_sesion(obj);
					}else{
						$('div#error_inicio_sesion').show();
					}
			}//end-of funcion de retorno
			
			// type of data to receive (in our case we're expecting an HTML snippet)
			var tipo = 'json';
			
			//Haciendo la llamda al post con AJAX
			$.post( url, dataToSend, callback,tipo);

		});
}

function cerrar_sesion(){
		//----------------------------
        // Cerrar sesión
        //----------------------------
        $("a#boton_cerrar_sesion").on('click',function(){
			$.post("index.php/hotel/cerrar_sesion/",null,
				function(data){
					
					$('li#registrarse_div').show();
					$('li#registrarse').show();
					$('li#inicio_sesion_div').show();
					$('li#inicio_sesion').show();
					
					
					$('li#sesion_iniciada').hide();
					$('li#cerrar_sesion_div').hide();
					$('li#cerrar_sesion').hide();
					$('li#ocupar_reservas').hide();
					$('li#ocupar_reservas_div').hide();
					$('li#reservas_estandar_div').hide();
					$('li#reservas_estandar').hide();
					$('li#reservas_admin').hide();
					$('li#reservas_admin_div').hide();
					$('li#reportes_div').hide();
					$('li#reportes').hide();
				
				$('#aviso_sesion_cerrada').foundation('reveal', 'open');
			} 
		);
		
		});

}


function msj_registro_usr(){
	//Mensajes de Registro
	$('#fr_registro_usuario')
		.on('invalid', function () {
		var invalid_fields = $(this).find('[data-invalid]');
			alert(invalid_fields);
			$('small.error').show();
		});
	
	$('#fr_registro_usuario')
		.on('valid', function () {
			console.log('valid!');
			$('small.error').hide();
		});
}

function msj_error_claves(){
	//Mensaje de error contraseñas no coinciden
	$("input#confirmacion_clave").on('blur',function(){
		c1 = $('input#clave_registro').val();
		c2 = $('input#confirmacion_clave').val();

		if( c1 != c2){
			$('span#error_claves_distintas').show();
		}else{
			$('span#error_claves_distintas').hide();
		}
	});	
}

function existe_usr(){
	//------------------------------------------------------------------
	//Existe usuario
	//------------------------------------------------------------------
	$('input#usuario_registro').on('blur',function(){
		u = $('input#usuario_registro').val(); 
		
		params = {usuario:u};
		var f1 = function(data){
			if(data.existe_usr){
				$('span#error_usuario_existente').show();
			}else{
				$('span#error_usuario_existente').hide();
			}
		}
		$.post('index.php/hotel/existe_usuario',params, f1,'json');
	});
}

function validacion_tarjeta(){
	//Validación ligera de Número de Tarjeta
	$('input#num_tarjeta').on('blur',function(){
		num = $(this).val();
		
		if(num.length != 16){
			$('span#error_num_tarjeta').show();
		}else{
			$('span#error_num_tarjeta').hide();
		}
	});

}

function guardar_usuario(){
	
	//------------------------------------------------------------------
	//Guardar usuario
	//------------------------------------------------------------------
	$('form#fr_registro_usuario').on('submit',function(event){
		event.preventDefault();
		// store reference to the form
		var bk_this = $(this);
		
		// grab the url from the form element
		var url = bk_this.attr('action');
			
		//Obteniendo la data del form
		var dataToSend = bk_this.serialize();
		
		
		//verificar existencia de usuario y que las claves coincidan
		var c1 = $('input#clave_registro').val();
		var c2 = $('input#confirmacion_clave').val();
		
		//obteniendo el usuario
		u = $('input#usuario_registro').val(); 
		params = {usuario:u};
		
		//validación sutil de la tarjeta
		valid_card = false;
		num_card = $('input#num_tarjeta').val();
		if(num_card.length == 16){
			valid_card = true;
		}
		
		var f1 = function(data){
			//Validación de existencia de usuario, contraseña, número de tarjeta = 16
			if(!data.existe_usr && c1 == c2 && valid_card){
				
				//declaracion de función
				var fo_enviar_data = function(data){
					obj = data;
					if(obj.estatus == "ok"){
						/** Redireccionando si todo va bien
						* 	en el registro automáticamente inicia sesión con
						*	con los permisos correspondientes. Por defecto es
						* 	un usuario estándar	
						*/
						$(location).attr('href','index.php/hotel/true');
					}else{
						$('#aviso_error_inesperado').foundation('reveal', 'open');
					}
				}//end-of funcion de retorno
				
				//Haciendo la llamada al post con AJAX
				$.post( url, dataToSend, fo_enviar_data,'json');
				
			}else{
				// Entraría aquí si pasa una cosa loca, pero la mayoría de 
				//las veces no lo haría.
				$('#aviso_error_registro').foundation('reveal', 'open');
			}
		}//end-of- var function: f1 validación de usuario, contraseña, num_tarjeta
		
		$.post('index.php/hotel/existe_usuario',params, f1,'json');
			
		});
}

function boton_reservar(){
		$('a#bt_reservar').on('click',function(){		  
		 
		 alert("--");
		checkboxs = $("div.tabla_base table td > :checked") ;
		longitud = checkboxs.length;
		
		bandera = 0;
		categoria = new Array();
		tipo = new Array();
		num_habitaciones = new Array();
		padres = new Array();		
		
		  
		if(longitud > 0 && /**confirm('¿Está seguro que desea reservar la siguientes habitaciones ?')**/ true ){
			checkboxs.each(		
				function(){
					categoria.push($(this).parent().parent().find('td #categoria').text());
					tipo.push($(this).parent().parent().find('td #tipo').text());
					num_habitaciones.push($(this).parent().parent().last().find('td:eq(3) :selected').text());
				}
			);
			
			
			total_cama = 0;
			alert(longitud);
			
			for (i = 0; i < longitud; i++)
			{
				//alert(num_habitaciones[i]);
				total_cama = total_cama +  parseInt(num_habitaciones[i]);
			}
			
			var table = $('<table  style="width:450px;"></table>');
					 
			 for(i=0; i <= total_cama; i++){
				 
				 if (i == 0){
					 
					 var rowd = $( '<td style="width:200px;"> Habitacion </td>' +
					 ' <td> Numero de adulto </td>' + ' <td> Numero de niños </td>');
				  
					 var rowt = $('<tr></tr>').append(rowd);
					 table.append(rowt);					 
					 
					 
				 }else{
					 
				var rowd = $( '<td style="width:200px;"> Habitacion' + i + '</td>' + '<td style="width:100px;"> <select style="width:50px;height:25px"> <option>0</option><option>1</option> <option>2</option> </select></td>'
				+ ' <td style="width:100px;"> <select style="width:50px;height:25px"> <option>0</option><option>1</option> <option>2</option> </select></td>');
			  
				 var rowt = $('<tr></tr>').append(rowd);
				 table.append(rowt);					 
					 
				 }
			}

			
		 $('#here_table').append(table);
		 $('#here_table').fadeIn(1000);
		 
		 //$('#confirmar').show();
		 //$('#bt_reservar_t').show();							  
	   }
	   	if(longitud == 0){
			alert('Debe seleccionar un contacto para eliminarlo');
		}
	   
	  });	
}


function _notas_viejas(){
		
		//abrir en la misma ventana
        //~ window.top.location.href = 'miPagina.html'
        
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

	//~ $("input, textarea").focus(function(){
		//~ $(this).css("background-color","#cccccc");
	//~ });
	//~ 
	//~ $("input, textarea").blur(function(){
		//~ $(this).css("background-color","#ffffff");
	//~ });
	
	
	  //$("div.tabla_base table td select").click(function(){
	  
	  /**
		$('#bt_reservar_t').on('click',function(){  
			
		$('#bt_reservar')show();
		$('#confirmar').hide();		
		$('#bt_reservar_t').hide();
		$('#here_table2').hide();
			
		});	
	  */
	  
	  //~ //Evento de Registrarse
		//~ $('a#registrarse').on('click',function(){
			//~ $('li#registrarse_div').hide();
			//~ $('li#registrarse').hide();
			//~ $('li#inicio_sesion_div').hide();
			//~ $('li#inicio_sesion').hide();
		//~ });
}










