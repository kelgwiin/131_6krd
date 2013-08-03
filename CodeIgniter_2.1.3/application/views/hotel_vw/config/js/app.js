$(document).ready(function(){
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
        
        
        //------------------
        //Inicio de Sesion
        //------------------
        $('a#boton_inicio_sesion').on('click',function(){
			pass = $('input#clave').val();
			usuario_ = $('input#usuario').val();
			
			params = {
				usuario:usuario_,
				clave: pass
			};
			//~ alert("entrooo");
			//haciendo la llamada ajax
			$.post("index.php/hotel/ini_sesion",params,
				function(data){
					obj = eval("(" + data + ")");//transformando el JSON a un Objeto JS
					
					if(obj.estatus == "ok"){ // el usuario y contraseña coinciden
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
							$('li#ocupar_reservas').show();
							$('li#ocupar_reservas_div').show();
						}
						
						//resetear
						$('input#usuario').val('');
						$('input#clave').val('');
						$('div#error_inicio_sesion').hide();
						
						$('#aviso_inicio_sesion').foundation('reveal', 'open');
						
					}else{
						//~ alert('error');
						$('div#error_inicio_sesion').show();
					}
					
				}
			);
		});       
        
        
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
					
					
				
				$('#aviso_sesion_cerrada').foundation('reveal', 'open');
			} 
		);
		
		});
        
        
        
        
        
        
        
        
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

   
   
}); //End-of: Funcion ready

function isNumber(num){
	if(/^([0-9])*$/.test(num) ){
		return true;
	}else{
		return false;
	}
	
}
