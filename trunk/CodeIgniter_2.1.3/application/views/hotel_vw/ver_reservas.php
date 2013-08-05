
<style type="text/css" title="currentStyle">
			@import "application/views/hotel_vw/config/DataTables-1.9.4/examples//examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css";
		</style>

<div class="row" style="margin:auto;" align = "center">
		
	<div class="large-12 columns">
            <!--Inicio de TABs -->
            
            <!--Fin de TABs -->
            <h3 align = "left">Reservas</h3>
            <?php 
            echo '
            <table id ="tb_rsv" cellpadding="0" cellspacing="0" border="0" class="display"> ' ;
            
            //~ echo '<table id = "tabla_rsv" class = "table_round"  width = "100%" >';
            ?>
            
            
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha de Entrada</th>
                        <th>Fecha de Salida</th>
                        <th>Categoría</th>
                        <th>Tipo</th>
                        <th>Cama Adicional</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr >
                        <td>1</td>
                        <td>2013-08-15</td>
                        <td>2030-08-30</td>
                        <td>N|B|A</td>
                        <td>1|2</td>
                        <td>N°</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2013-08-15</td>
                        <td>2030-08-30</td>
                        <td>N|B|A</td>
                        <td>1|2</td>
                        <td>N°</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2013-08-15</td>
                        <td>2030-08-30</td>
                        <td>N|B|A</td>
                        <td>1|2</td>
                        <td>N°</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>2013-08-15</td>
                        <td>2030-08-30</td>
                        <td>N|B|A</td>
                        <td>1|2</td>
                        <td>N°</td>
                    </tr>
                    <?php
                        for($i = 0 ; $i < 30; $i++){
                            echo '<tr>
                                <td>33</td>
                        <td>2013-08-15</td>
                        <td>2030-08-30</td>
                        <td>N|B|A</td>
                        <td>1|2</td>
                        <td>N°</td>
                    </tr>';
                        }
                    ?>
                    
                </tbody>
                
            </table>
            
    </div> 
    
</div>


<!--<div class="row" style="margin:auto;">
	<div class="large-12 columns" style="text-align:center;">	
		<div class="panel radius" style=" background-color:white;border-color:gray; border-width:3px; ">	


			<h3>Reservas</h3><hr>
			
			<form> 
			<div class="tabla_base" style="margin:auto;width:800px;" >
               <table id ="reservas">
					<tr name = "pp">
						<td>
							Check
						</td>
						<td>
                           fecha de entrada
						</td>
						<td>
                           fecha de salida
						</td>												
						<td>
                           Categoria
						</td>
                        <td >
                            Tipo
                        </td>
                        <td>
                           cama adicional 
                        </td>
                    </tr>
                    
					<tr name = "pp">
						<td>
							    <input type = "checkbox" name = "ooo"> 
						</td>
						<td>
                           fecha de entrada
						</td>
						<td>
                           fecha de salida
						</td>												
						<td>
                           Categoria
						</td>
                        <td >
                            Tipo
                        </td>
                        <td>
                           cama adicional 
                        </td>
                    </tr>                 
                 
					<tr name = "pp">
						<td>
							    <input type = "checkbox" name = "ooo"> 
						</td>
						<td>
                           fecha de entrada
						</td>
						<td>
                           fecha de salida
						</td>												
						<td>
                           Categoria
						</td>
                        <td >
                            Tipo
                        </td>
                        <td>
                           cama adicional 
                        </td>
                    </tr>
  					
                </table>
                
            </div>
            
            <hr>           
   				<div align="center" class="row">
				<div class="large-12 columns" style="margin-top:30px; text-align:center;">
					<a style="width:150px;height:50px;" id="bt_reservar" class="button"  >Modificar reserva</a>
					<a style="margin-left:45px;width:150px;height:50px;" id="bt_reservar" class="button"  >Cancelar reserva</a>				
				</div>         
				</div>
            
          </form>
        
         <hr><br>     
        
		</div>
	</div>		
</div>            -->
            
