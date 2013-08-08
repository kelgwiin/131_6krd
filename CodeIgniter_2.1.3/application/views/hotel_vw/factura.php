<div class = "row" style= "margin-top:50px" align = "center">
	<div class = "large-12 colums ">
		<table border = "1" cellspacing = "10">
			<tbody>
				<tr>
				<td>
					<code>
						<p align = "center">Hotel Droche</p>
					<p> Factura #<?php echo $f['#']; ?> </p>
					Fecha: <?php echo $f['fecha_emision']; ?> <br>
					Número Habitación: <?php echo $f['items'][0]['num_hab'];?><br>
					
					<table>
						<thead>
							<tr>
								<th>Nombre</th> <th>Precio total</th> <th>Cant.</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
							$total = 0;
								foreach ($f['items'] as $fila){
									echo '<tr>';
									foreach($fila as $key=>$val ){
										if($key != 'num_hab'){
											printf('<td>%s</td>',$val);
										}
										
										if($key == 'precio'){
											$total += $val;
										}
									}
									echo '</tr>';
								}
								echo '<tr><td>Total</td>';
								printf('<td>%d</td> <td></td>',$total);
								
								echo '</tr>';
							?>
							
							
						</tbody>
					</table>
					
					</code>
				</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

