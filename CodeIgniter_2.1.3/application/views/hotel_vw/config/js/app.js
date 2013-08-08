
calendarios();
//Principal
_main();

function _main(){
	$(document).ready(function(){
		
		
		msj_creacion_nuevo_usr();
	
		inicio_sesion();
        
		cerrar_sesion();
		
		existe_usr();
		
		tabla();
    
		msj_registro_usr();
		
		msj_error_claves();
	
		validacion_tarjeta();
	
		
	
		filtrar_disponibilidad();
		
		disponibilidad_todos();
		
		boton_hacer_reservar();
		
		boton_completar_reserva();
		
		boton_no_completar_reserva();
		
		cerrar_msj_hab();
		
		boton_cancelar_reserva();
		
		boton_ocupar_reserva();
		
		boton_cerrar_reserva();
		
		boton_ver_factura();
		
		guardar_usuario();
		
		//pendiente viejo sin desarrollar mucho
		//~ boton_reservar();
		
	}); //End-of: Funcion ready
	
}//end-of-function: main

function boton_ver_factura(){
	$('a#boton_ver_factura').on('click',function(){
		checkboxs = $("div table.display  td > :checked") ;
		longitud = checkboxs.length;
		
		var id_, celda_estatus ;
		
		
		if(longitud == 1){
			
			checkboxs.each(		
				function(){
					cb = $(this);
					fila = cb.parent().parent();
					id_ = fila.find('td:eq(1)').text();
					celda_estatus = fila.find('td:eq(9)');
				}
			);
			
			if(celda_estatus.text() == 'cerrada' || 
			celda_estatus.text() == 'cancelada'){
				
				//abriendo una nueva ventana
				open('index.php/hotel/ver_facturas/'+id_);
				
			}else{
				$('p#msj_hab').
				html('La reserva no ha sido cerrada o cancelada');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}
			
		}else{
			
			if(longitud > 1){
				$('p#msj_hab').
				html('Debe selecionar sólo una reseva');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}else{
				$('p#msj_hab').
				html('Debe selecionar una reserva');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}
		}
		
	});

}

function boton_cerrar_reserva(){
	$('a#boton_cerrar_reserva').on('click',function(){
		checkboxs = $("div table.display  td > :checked") ;
		longitud = checkboxs.length;
		
		var id_, celda_estatus ;
		
		
		if(longitud == 1){
			//confirmacion
			if(confirm('¿Está seguro que desea cerrar la reserva?') ){
			checkboxs.each(		
				function(){
					cb = $(this);
					fila = cb.parent().parent();
					id_ = fila.find('td:eq(1)').text();
					categoria_ = fila.find('td:eq(7)').text();
					tipo_ = fila.find('td:eq(8)').text();
					celda_estatus = fila.find('td:eq(9)');
				}
			);
			
			if(celda_estatus.text() != 'cerrada' &&
			celda_estatus.text() == 'ocupada'){
				
				params = {
					id:id_,
					categoria_hab:categoria_,
					tipo_hab:tipo_
				}
				//llamada ajax
				$.post('index.php/hotel/cerrar_reserva_ajax',params,function(data){
					
					//cambiando el estatus de la fila
					celda_estatus.html('cerrada');
					
					$('p#msj_hab').
					html('Reserva cerrada, ya puede ver factura');
					$('#mensaje_habitaciones').foundation('reveal', 'open');
				
				});
			}else{
				$('p#msj_hab').
				html('La reserva ya fue cerrada o no está ocupada');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}
			
		  }//end-of if: confirmación
		}else{
			
			if(longitud > 1){
				$('p#msj_hab').
				html('Debe selecionar sólo una reseva');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}else{
				$('p#msj_hab').
				html('Debe selecionar una reserva');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}
		}
		
	});

}

function boton_ocupar_reserva(){
	$('a#boton_ocupar_reserva').on('click',function(){
		checkboxs = $("div table.display  td > :checked") ;
		longitud = checkboxs.length;
		
		var id_, celda_estatus ;
		
		
		if(longitud == 1){
			//confirmacion
			if(confirm('¿Está seguro que desea ocupar la reserva?') ){
			checkboxs.each(		
				function(){
					cb = $(this);
					fila = cb.parent().parent();
					id_ = fila.find('td:eq(1)').text();
					categoria_ = fila.find('td:eq(7)').text();
					tipo_ = fila.find('td:eq(8)').text();
					celda_estatus = fila.find('td:eq(9)');
					celda_id_hab = fila.find('td:eq(2)');
				}
			);
			
			if(celda_estatus.text() != 'ocupada' &&
			celda_estatus.text() == 'activa'){
				
				params = {
					id:id_,
					categoria_hab:categoria_,
					tipo_hab:tipo_
				}
				//llamada ajax
				$.post('index.php/hotel/ocupar_reserva_ajax',params,function(id_hab){
					
					//cambiando el estatus de la fila
					celda_estatus.html('ocupada');
					
					//asignando el número de habitación
					celda_id_hab.html(id_hab);
					
					$('p#msj_hab').
					html('Reserva ocupada');
					$('#mensaje_habitaciones').foundation('reveal', 'open');
				
				});
			}else{
				$('p#msj_hab').
				html('La reserva ya fue ocupada o no está activa');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}
			
		  }//end-of if: confirmación
		}else{
			
			if(longitud > 1){
				$('p#msj_hab').
				html('Debe selecionar sólo una reseva');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}else{
				$('p#msj_hab').
				html('Debe selecionar una reserva');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}
		}
		
	});

}
function boton_cancelar_reserva(){
	$('a#boton_cancelar_reserva').on('click',function(){
		checkboxs = $("div table.display  td > :checked") ;
		longitud = checkboxs.length;

		var id_, celda_estatus ;
		
		
		if(longitud == 1){
			//confirmacion
			if(confirm('¿Está seguro que desea cancelar la reserva?') ){
			checkboxs.each(		
				function(){
					cb = $(this);
					fila = cb.parent().parent();
					id_ = fila.find('td:eq(1)').text();
					celda_estatus = fila.find('td:eq(9)');
				}
			);
			
			if(celda_estatus.text() != 'cancelada' && 
			celda_estatus.text() == 'activa'){
				
				//llamada ajax
				$.post('index.php/hotel/cancelar_reserva_ajax',{id:id_},function(resp){
					if(resp.estatus == 'ok'){
						//cambiando el estaus de la fila
						celda_estatus.html('cancelada');
						
						$('p#msj_hab').
						html('Reserva cancelada');
						$('#mensaje_habitaciones').foundation('reveal', 'open');
					}else{
						alert('Error inesperado');
					}
				},'json');
			}else{
				$('p#msj_hab').
				html('La reserva ya fue cancelada o no está activa');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}
			
		  }//end-of if: confirmación
		}else{
			
			if(longitud > 1){
				$('p#msj_hab').
				html('Debe selecionar sólo una reseva');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}else{
				$('p#msj_hab').
				html('Debe selecionar una reserva');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
			}
		}
		
	});

}

function boton_completar_reserva(){
	$('a#completar_reserva').on('click',function(){
		//armando los parámetros para ingresarlos en la BD
		
		usr = $('span#nombre_usuario').attr('value');
		num_camas = $('select#num_camas_infantiles').val();
		fecha_ini_ = $('input[name="fecha_ini"]').val();
		fecha_fin_ = $('input[name="fecha_fin"]').val();
		c = $('div[name="categoria"]').attr('value');
		t = $('div[name="tipo"]').attr('value');
		
		//Para almacenar en la BD
		params = {
			id_usuario:usr,
			num_camas_infantiles:num_camas,
			fecha_ini:fecha_ini_,
			fecha_fin:fecha_fin_,
			categoria_habitacion:c,
			tipo_habitacion:t
		};
		
		
		//~ alert('.'+usr + '. '+ num_camas + ' ' + fecha_ini_ + ' ' +fecha_fin_
		//~ +' '+c + ' ' +t);
		
		//haciendo la llamada ajax al servidor
		$.post('index.php/hotel/reservar_ajax',params, function(resp){
			
			if(resp == 'ok'){
				//actualizar la fila gráfica
				index_fila = $('div[name="index_fila"]').attr('value');
			
				//disminuyendo la cantidad de habitaciones	
				fila_sel = $('div table.display  tbody tr:eq('+index_fila+')');
				celda = fila_sel.find('td:eq(3)');
				val_celda = parseInt(celda.text());
				celda.html(val_celda-1);
				
				alert('Reserva creada');
				//cerrando la ventana de num de habitaciones
				$('#completar_reserva').foundation('reveal', 'close');
			}else{
				alert('error inesperado del servidor');
			}
		});
	});
}

function boton_no_completar_reserva(){
	$('a#no_completar_reserva').on('click',function(){
		$('#completar_reserva').foundation('reveal', 'close');
	});
}

function cerrar_msj_hab(){
	$('a#cerrar_msj_hab').on('click',function(){ 
		$('#mensaje_habitaciones').foundation('reveal', 'close');
	});
}
function boton_hacer_reservar(){
	$('a#boton_hacer_reservar').on('click', function(){
		 
		checkboxs = $("div table.display  td > :checked") ;
		longitud = checkboxs.length;
		
		var categoria, tipo, num_habitaciones, index_fila ;
		  
		if(longitud == 1 ){
			checkboxs.each(		
				function(){
					cb = $(this);
					index_fila = cb.parent().parent().index();
					categoria = cb.parent().parent().find('td:eq(1)').text();
					tipo = cb.parent().parent().find('td:eq(2)').text() ;
					num_habitaciones = cb.parent().parent().find('td:eq(3)').text();
				}
			);
			
			
			if(num_habitaciones != 0){// validando la cantidad de habitaciones
				
				switch (categoria)
				{
					case 'Normal':
						cat_val = 'N';
						break;
					case 'Business':
						cat_val = 'B';
						break;
					case 'Alta':
						cat_val = 'A';
						break;
				}
				
				if(tipo == "Individual"){
					tipo_val = 1;
				}else{
					tipo_val = 2;
				}
			
				$('div [name="tipo"]').attr('value',tipo_val);
				$('div [name="categoria"]').attr('value',cat_val);
				$('div [name="index_fila"]').attr('value',index_fila);
			
				$('h5#titulo_habitaciones').html('Habitación '+ categoria + ' - ' +tipo);
			
				//abrir la ventana emergente
				$('#completar_reserva').foundation('reveal', 'open');
			}else{
				$('p#msj_hab').
				html('No hay habitaciones disponibles, no se puede reservar ');
				$('#mensaje_habitaciones').foundation('reveal', 'open');
				//~ alert('No hay habitaciones disponibles, no se puede reservar ');
			}
			
		}else{
			if(longitud > 1){
				$('p#msj_hab').
				html('Debe selecionar sólo un tipo de habitación');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
				//~ alert('Debe selecionar sólo un tipo de habitación');
			}else{
				$('p#msj_hab').
				html('Debe selecionar un tipo de habitación');
				
				$('#mensaje_habitaciones').foundation('reveal', 'open');
				//~ alert('Debe selecionar un tipo de habitación');
			}
		}
	});
}

function disponibilidad_todos(){
	$('input#todos_disp').on('change',function(e){
		cb = e.currentTarget;
		
		if(cb.checked){
			$('select#tipo, select#categoria').attr('disabled','disabled');
		}else{
			$('select#tipo, select#categoria').removeAttr('disabled');
		}
	});
}
function filtrar_disponibilidad(){
	$('a#boton_filtrar_disponibilidad').on('click',function(){

		fecha_ini_ = $('input[name="fecha_ini"]').val();
		fecha_fin_ = $('input[name="fecha_fin"]').val();
		categoria_ = $('select#categoria').val();
		categoria_name = $('select#categoria option:selected').attr('id');
		tipo_ = $('select#tipo').val();
		tipo_name = $('select#tipo option:selected').attr('id');
		
		
		if(fecha_ini_.length > 0 && fecha_fin_.length > 0){
			$('span#error_ingresa_fechas').hide();
			
			//Limpiando la tabla
			objTabla = $('#tb_disponibilidad').dataTable();
			objTabla.fnClearTable();	
			
			//verificando si es todo o filtrado
			if($('input#todos_disp').is(':checked') ){//todos
				p = {
					fecha_ini:fecha_ini_,
					fecha_fin:fecha_fin_
				};
				
				var ftodos = function(tabla_info){
					objTabla.fnAddData(tabla_info);
				} 
				
				$.post('index.php/hotel/disponibilidad_todos_ajax',
				p,ftodos,'json');
				
			}else{//filtrado
					params = {
						fecha_ini:fecha_ini_,
						fecha_fin:fecha_fin_,
						categoria:categoria_,
						tipo:tipo_
					};
					
					//función para pasar al post
					var fdispo = function(cant_hab_disp){
						//actualizando la tabla
						data_tabla = [
							'<input type = "checkbox">',
							categoria_name,
							tipo_name,
							cant_hab_disp
						];
						objTabla.fnAddData(data_tabla);
					}
			
					//llamada ajax
					$.post('index.php/hotel/disponibilidad_ajax',params,fdispo);
				
			}//end-of if
			
		}else{
			$('span#error_ingresa_fechas').show();
		}
	});
}


/**Configuraciones para el inicio de sesión formateando y escondiendo
* ciertos elementos
*/ 
function config_inicio_sesion(obj){
			$('li#registrarse_div').hide();
			$('li#registrarse').hide();
			$('li#inicio_sesion_div').hide();
			$('li#inicio_sesion').hide();
						
			$('span#nombre_usuario').text(obj.usuario);
			$('span#nombre_usuario').attr('value',obj.usuario);
			
			$('li#sesion_iniciada').show();
			$('li#cerrar_sesion_div').show();
			$('li#cerrar_sesion').show();
			
			$('a#boton_hacer_reservar').show();
						
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
       var oTable = $('#tb_rsv,#tb_disponibilidad,#tb_mis_reservas, #tb_reservas_reservas_admin').dataTable({
             "bJQueryUI": false,
             "sPaginationType": "full_numbers",
             "oLanguage": {
                "sUrl": "application/views/hotel_vw/config/DataTables-1.9.4/languages/datatable.es.txt"
            },
             "sScrollX": "100%",
			"sScrollXInner": "110%",
			"bScrollCollapse": true
        });
        //Cuando cambia de tamaño
         $(window).bind('resize', function () {
			oTable.fnAdjustColumnSizing();
		} );
		
        $('#tb_rsv tr').click(function() {
            $(this).toggleClass('row_selected');
        } );
        
        $('#tb_disponibilidad tr').click(function() {
            $(this).toggleClass('row_selected');
        } );
        
        //resaltando agregando la clase css hightlighted
        oTable.$('td').hover( function() {
			oTable.$('tr').addClass( 'highlighted' );
		}, function() {
			oTable.$('td.highlighted').removeClass('highlighted');
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
					
					$('a#boton_hacer_reservar').hide();
				
				//se deberían de quitar los hides de arriba pero me da flojera
				//~ $('#aviso_sesion_cerrada').foundation('reveal', 'open');
				//redirigiendo a inicio
				$(location).attr('href','index.php/hotel/');
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
						$(location).attr('href','index.php/hotel/true');
						/** Redireccionando si todo va bien
						* 	en el registro automáticamente inicia sesión con
						*	con los permisos correspondientes. Por defecto es
						* 	un usuario estándar	
						*/
						
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

function calendarios(){
		
		
	  $(function() {
		
		$("#datepicker_entrada" ).datepicker({ 
			dateFormat: "yy-mm-dd" ,
			dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
			dayNamesMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			dayNamesShort:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			
			monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
			changeYear:true,
			yearRange:"c-100:c+100"
		}); 
		
		});
		
		
	 
	  $(function() {
		$("#datepicker_salida" ).datepicker({ 
			dateFormat: "yy-mm-dd" ,
			dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
			dayNamesMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			dayNamesShort:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			
			monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
			changeYear:true,
			yearRange:"c-100:c+100"
		}); 
	  });
	 
	  $(function() {
		$("#datepicker_registro").datepicker({ 
			dateFormat: "yy-mm-dd" ,
			dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
			dayNamesMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			dayNamesShort:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			
			monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
			changeYear:true,
			yearRange:"c-100:c+100"
		}); 
	  });
	 
	  $(function() {
		$("#datepicker_disp_ini" ).datepicker({ 
			dateFormat: "yy-mm-dd" ,
			dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
			dayNamesMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			dayNamesShort:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			
			monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
			changeYear:true,
			yearRange:"c-100:c+100"
		}); 
	  });
	 		 
	  $(function() {
		$("#datepicker_disp_sal" ).datepicker({ 
			dateFormat: "yy-mm-dd" ,
			dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
			dayNamesMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			dayNamesShort:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			
			monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
			changeYear:true,
			yearRange:"c-100:c+100"
		}); 
	  });
}

function isNumber(num){
	if(/^([0-9])*$/.test(num) ){
		return true;
	}else{
		return false;
	}
}






