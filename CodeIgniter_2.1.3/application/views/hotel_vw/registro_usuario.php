	
<div class="row" style="margin:auto;">
	<div class="large-12 columns" style="text-align:center;">	
		<div class="panel radius" style=" background-color:white;border-color:gray; border-width:3px; ">		

		<h3>Registro de usuario</h3><hr>
		<form style="margin-left:50px">
		 
			<div class="row collapse">
				<div class="small-3 large-2 columns" style="width:90px;">
					<span class="prefix">Nombre:</span>
				</div>
				<div class="small-9 large-3 columns" style="float:left;width:150px;">
					<input name ="nombre" type="text" placeholder="" title ="Ingrese el nombre">
				</div>
			
				<div style="margin-left:100px;width:90px;" class="small-3 large-2 columns">
					<span class="prefix" >Apellido:</span>
				</div>
				<div class="small-9 large-3 columns" style="float:left;width:150px;">
					<input name ="apellido" title ="Ingrese el apellido" type="text" placeholder="">
				</div>   
			</div>
			
			<div class="row collapse" style="margin-top:15px;">
				<div class="small-3 large-2 columns" style="width:90px;">
					<span class="prefix">Correo Electronico:</span>
				</div>
				<div class="small-9 large-3 columns" style="float:left;width:170px;">
					<input name ="correo" type="text" placeholder="nombre@droche.com">
				</div>
			
				<div style="margin-left:80px;width:90px;" class="small-3 large-2 columns">
					<span class="prefix">Contraseña:</span>
				</div>
				<div class="small-9 large-3 columns" style="float:left;width:150px;">
					<input name ="clave"type="text" placeholder="">
				</div>   
			</div>	
			
		  
			<div class="row collapse" style="margin-top:15px;">
				<div class="large-1 small-2 columns" style="width:90px;">
					<span class="prefix">Sexo</span>
				</div>
				<div class="large-2 small-4 columns" style="float:left;width:150px;">
				  <select name ="sexo"style="height:32px;">
					<option>F</option>
					<option>M</option>
				  </select>
				</div>
				
				<div style="margin-left:100px;width:90px;" class="small-3 large-2 columns">
					<span class="prefix">Telefono:</span>
				</div>
				<div class="small-9 large-3 columns" style="float:left;width:150px;">
					<input name ="telefono" type="text" placeholder="">
				</div>      
			 
			</div>  
		  
			<div class="row collapse" style="margin-top:30px;">
				<div class="large-1 small-2 columns" style="width:90px;">
					<span class="prefix">Fecha de nacimiento</span>
				</div>
				<div class="large-2 small-4 columns" style="float:left;width:150px;">
				  <input  id="datepicker_entrada" type="text" name ="fecha_nac" placeholder ="">
				</div>
				
                            
				<div style="margin-left:100px;width:150px;" class="small-3 large-2 columns">
					<span class="prefix">Número de Tarjeta:</span>
				</div>
				<div class="small-9 large-3 columns" style="float:left;width:150px;">
					<input name ="num_tarjeta" type="text" placeholder="">
				</div>      
				
			 
			</div>  
			<div class="row collapse" style="margin-top:30px;">
				<div class="large-1 small-2 columns" style="width:90px;">
					<span class="prefix">Nacionalidad</span>
				</div>
				<div class="large-2 small-4 columns" style="float:left;width:150px;">
				  <select name ="nacionalidad"style="height:32px;">
                                            <option title ="Venezolano" >V</option>
                                            <option title ="Extranjero">E</option>
                                        </select>
				</div>
				
                            <div style="margin-left:100px;width:150px;" class="small-3 large-2 columns">
					<span class="prefix">Tipo de cuenta:</span>
				</div>
				<div class="small-9 large-3 columns" style="float:left;width:150px;">
					<select name ="tipo_cuenta"style="height:32px;">
                                            <option>Ahorro</option>
                                            <option>Corriente</option>
                                        </select>
				</div>       
			 
			</div>  
		  		  
			<div class="row"><br>
				<div class="small-9 large-3 columns" style="float:left">
					<h5 style="text-align:left;">Direccion:</h5>
					<textarea name="direccion" style="width:300px; height:100px;" id="message" name="direccion" rows="6" cols="50"></textarea>
				</div> 
				</div>
				
				<div class="row">
				<div class="large-3 columns" style="margin-left:200px; text-align:center;">
					<br> <a href="#" id="" class="button"  >Guardar</a>
				</div>		
				<div class="large-3 columns" style="text-align:center; float:left;">
					<br> <a href="#" id="" class="button"  >Cancelar</a>
				</div>
			</div>
		  
		<hr><br>
		</form>


		</div>
	</div>		
</div>	
