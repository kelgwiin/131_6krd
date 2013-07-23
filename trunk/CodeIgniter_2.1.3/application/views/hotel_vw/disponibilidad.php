

<div class="row" style="margin:auto;">
	<div class="large-12 columns" style="text-align:center;">	
		<div class="panel radius" style=" background-color:white;border-color:gray; border-width:3px; ">	


			<h3>Habitaciones Disponibles</h3><hr>
			
			<form style="margin-left:50px">
		 
				<div class="row collapse">
					<div class="small-3 large-1 columns">
						<span class="prefix">Entrada:</span>
					</div>
					<div class="small-9 large-1 columns" style="float:left">
						<input id="datepicker_entrada" type="text" placeholder="">
					</div>
				
					<div style="margin-left:40px;" class="small-3 large-1 columns">
						<span class="prefix">Salida:</span>
					</div>
					<div class="small-9 large-1 columns" style="float:left">
						<input id="datepicker_salida" type="text" placeholder="">
					</div>   
				
				
				<div class="large-2 small-2 columns" style="margin-left:60px;width:90px;">
					<span class="prefix">Categoria</span>
				</div>
				<div class="large-2 small-4 columns" style="float:left;width:90px;">
				  <select style="height:32px;">
					<option>Business</option>
					<option>Normal</option>
					<option>Alta</option>
				  </select>
				</div>		
				
				<div class="large-2 small-2 columns" style="margin-left:40px;width:90px;">
					<span class="prefix">Tipo</span>
				</div>
				<div class="large-2 small-4 columns" style="float:left;width:90px;">
				  <select style="height:32px;">
					<option>Individual</option>
					<option>Doble</option>
				  </select>
				</div>								
						
						
				</div>		
						
							
			</form> <hr><br>
			
			<form> 
			<div class="tabla_base" style="margin:auto;width:800px;" >
               <table >
					<tr name = "pp">
						<td>
							Check
						</td>
						<td>
                           Categoria
						</td>
                        <td >
                            Tipo
                        </td>
                        <td>
                            # Habitaciones
                        </td>
                    </tr>
                    
                    
                    <tr name = "abuelo">
						
						
						
                        <td name = "ppppp...">
                           <input type = "checkbox" name = "ssss"> 
                        </td>						
						
                        <td>
							<div id="categoria">
                            Primero
                            </div>
                        </td>
                        <td>
							<div id="tipo">
                            Row 1
                            </div>
                        </td>
                        <td>
							<select id ="select" style="width:50px;height:25px"> 
								<option>0</option>
								<option>1</option>
								<option>2</option>
							</select></td>
                        </td>
                    </tr>                  
                 
                    <tr>
						
                        <td >
                           <input type = "checkbox" name = "ooo"> 
                        </td>						
						
						
                        <td >
							<div id="categoria">
                            Row 2
                            </div>
                        </td>
                        <td>
							<div id="tipo">
                            Row 2
                            </div>
                        </td>
                        <td>
							<select id ="select" style="width:50px;height:25px"> 
								<option>0</option>
								<option>1</option>
								<option>2</option>
							</select></td>
                        </td>
                    </tr>
  					
                        <td >
                           <input type = "checkbox" name = ""> 
                        </td>						
                        <td >
							<div id="categoria">
                            Row 3
                            </div>
                        </td>
                        <td>
							<div id="tipo">
                            Row 3
                            </div>
                        </td>
                        <td>
							<select id ="select" style="width:50px;height:25px"> 
								<option>0</option>
								<option>1</option>
								<option>2</option>
							</select></td>
                        </td>
                    </tr>
                </table>
                
            </div>
            <hr>
                <div class="tabla_base" align = "center" id="here_table" style="margin:auto;width:800px;" > </div>  
        
   				<div class="row">
				<div class="large-12 columns" style="margin-top:30px; text-align:center;">
					<br> 
					<a  id="bt_reservar" class="button"  >reservar</a>
					
				</div>         
				</div>
            
          </form>
         
         <hr><br>
         
   <?php
    
   //~ Para la tabla
   /**
   $cabecera;
   $informacion;
   
   echo '<table class = "tabla_base">  <tbody>';
   
   echo "<tr>"
   foreach ($cabecera as $val){
		printf("<td>%s</td>",$val);
   }
   echo "</tr>";
   
   foreach ($informacion as $row){
		echo "<tr>";
		foreach($row as $item){
			
			if($item == "check"){
				echo '<input type = "checkbox" name = "' . $ALGUN_nombreoID . '" >';
			}else{
				printf("<td>%s</td>",$item);
			}
			
			
		}
		echo "</tr>";
	
   }
   
   echo "</tbody></table>"
      
   **/
   ?>         
         
         
            
		</div>
	</div>		
</div>            
            
