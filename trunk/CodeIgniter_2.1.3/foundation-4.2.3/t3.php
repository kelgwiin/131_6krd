<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Foundation 4</title>

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/config_f_krd.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/orbit.css">
  
  <!--  
  <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="js/jquery.orbit.min.js" type="text/javascript"></script>
	-->
	
  <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>

	
<!-- Barra superior-->
<div class="contain-to-grid sticky"> 
	<nav class = "top-bar">   
	<ul class = "title-area">
		<li class = "name">
		<h1><a href="#"> <img src="img/D1.jpg">D'roche</a></h1>
		</li>
	</ul>
		
	<ul class="right">
		<ul id="botones" class="button-group">
			<li><a href="#" class="small button">Registrase</a></li>
				<li><a href="#" data-dropdown="drop2" class="small button" >Iniciar Sesion</a>
				
				<ul id="drop2" class="f-dropdown content" data-dropdown-content>
				<form>
					<label for="Correo_sesion"> <h6> Correo </h6> </label>
						<div class="row">						
						<div class="large-12 columns ">				
							<input id="Correo_sesion" type="text" placeholder="">
						</div></div>	
							
					  <br>			
					  <label for="Contraseña_sesion"> <h6> Contraseña </h6> </label>
						<div class="row">						
							<div class="large-12 columns ">
								<input id="Contraseña_sesion" type="text" placeholder="">
						</div></div>	
							
						<div class="row">
						<div class="large-12 columns" style="text-align:center;">
							<br> <a href="#" id="botones" class="button"> Entrar</a>
						</div></div>
															
				</form>
				</ul>
				</li>				  
			  
		</ul>
	</ul>
	
</nav>	
</div>	
	
<!-- Contenedor medio -->
	<!-- Galeria de imagenes -->
	<br>
	<div class="row">
		<div class="large-9 columns">
				
			<div class="slideshow-wrapper">	
				<div class="preloader"></div>	
					<!-- Orbit Container -->
					<div class="orbit-container" style="width:720px; height:450px;">
					<ul data-orbit="" class="orbit-slides-container">
						<li>
							<img src="img/hotel444.jpg">
							<div class="orbit-caption">Descripcion de la imagen</div>
						</li>
						<li>
							<img src="img/hotel555.jpg">
							<div class="orbit-caption">Descripcion de la imagen</div>
						</li>
						<li>
							<img src="img/hotel777.jpg">
							<div class="orbit-caption">Descripcion de la imagen</div>
						</li>
					</ul>
					</div>
			</div>
		</div>
	  
		<!-- Panel Disponibilidad -->
		<div class="large-3 columns" >
			<div class="panel" style="width:240px; height:450px; background-color:#D8D8D8; border: black 1px solid; ">
				<h3 style="text-align:center;">Disponibilidad</h3><br>
					  <form>
							<label for="fecha_entrada"> <h5> Fecha de entrada </h5> </label>
							<div class="row collapse">						
								<div class="large-8 columns ">
									<input id="fecha_entrada" type="text" placeholder="">
								</div>
							
								<div class="large-4 columns">
									<a href="#" id="botones" class="tiny button" style="height:33px">Fecha</a>
								</div>
							
							</div>
							
							<br>
							<label for="fecha_salida"> <h5> Fecha de salida </h5> </label>
							<div class="row collapse">						
								<div class="large-8 columns">					
									<input id="fecha_salida"type="text" placeholder="">
								</div>
							
								<div class="large-4 columns">
									<a href="#" id="botones" class="tiny button" style="height:33px">Fecha</a>
								</div>
							
							</div>							
							<br>
							<div class="row"> 
								<div class="large-12 columns">
									<label for="customDropdown1"><h5> Tipo Habitacion </h5></label>
										<select id="customDropdown1" class="medium">
											<option DISABLED> Presidencial </option>
											<option>Normal</option>
											<option>Business</option>
											<option>Alta</option>
										 </select>
								</div>							
							</div>
							
							<div class="row">
								<div class="large-12 columns" style="text-align:center;">
									<br> <a href="#" id="botones" class="button"  >Buscar</a>
								</div>
							</div>
					</form>		
			</div>
		</div>
		<hr/>
  
<!-- Three-up Content Blocks -->

	<div class="row">
		<div class="large-4 columns">
			<img src="img/hotel88.jpg" />
		  
			<ul class="pricing-table">
			  <li class="title">Normal</li>
			  <li class="price">$29.99</li>
			  <li class="description">Descubre la elegancia tropical en nuestra habitación Standard 
			  de 50 metros cuadrados, que ofrece una cama King o 2 camas individuales, 2 sofás 
			  individuales y un escritorio. Disfruta la brisa de la isla mientras ves la TV vía satélite. 
			  Las comodidades incluyen botellas de agua mineral de cortesía y mucho más.</li>
			  <li class="cta-button"><a id="botones" class="button" href="#">Reservar</a></li>
			</ul>
		</div>
    
		<div class="large-4 columns">
			<img src="img/hotel99.jpg" />
		  
			<ul class="pricing-table">
			  <li class="title">Business</li>
			  <li class="price">$49.99</li>
			  <li class="description"> Nuestras Suites Presidencial y Royal, lo mejor del lujo, ofrecen 
			  dormitorio y área de estar independientes, con elegante decoración. Elige entre una cama 
			  King en la Suite Presidencial o dos dormitorios con una cama King y dos camas individuales 
			  en la Suite Royal, y disfruta de comodidades como minibar. </li>
			  <li class="cta-button"><a id="botones"  class="button" href="#">Reservar</a></li>
			</ul>
		</div>
    
		<div class="large-4 columns">
			<img src="img/hotel1010.jpg" />
		  
			<ul class="pricing-table">
			  <li class="title">Alta</li>
			  <li class="price">$99.99</li>
			  <li class="description">Nuestra amplia Suite Master de 108 metros cuadrados ofrece a los 
			  huéspedes un área de estar elegantemente decorada y dos dormitorios independientes. Disfruta 
			  de un minibar, botellas de agua mineral de cortesía y TV vía satélite.  Las comodidades también
			   incluyen un lujoso baño, caja fuerte y mucho más</li>
			  <li class="cta-button"><a id="botones" class="button" href="#">Reservar</a></li>
			</ul>
		</div>
   </div>
    
  <!-- footer -->
   <footer class="row" style="background-color:gray">
	<div class="large-12 columns" >
		<hr/>
		<div class="panel" style="width:1000px; height:80px;">
		<div class="row">
			<div class="large-6 columns">
				<p>&copy; Copyright no one at all. Go to town.</p>
			</div>
			
			<div class="large-6 columns">
			<ul class="inline-list right">
				<li><a href="#">Contacto</a></li>
			</ul>
			</div>
			
		</div>
		</div>
	</div> 
  </footer> 
  
  
  
  <!-- Carga de script -->
    <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  <script src="js/foundation.min.js"></script>
  <script src="js/foundation/foundation.js"></script>
  <script src="js/foundation/foundation.alerts.js"></script>
  <script src="js/foundation/foundation.clearing.js"></script>
  <script src="js/foundation/foundation.cookie.js"></script>
  <script src="js/foundation/foundation.dropdown.js"></script>
  <script src="js/foundation/foundation.forms.js"></script>
  <script src="js/foundation/foundation.joyride.js"></script>
  <script src="js/foundation/foundation.magellan.js"></script>
  <script src="js/foundation/foundation.orbit.js"></script>
  <script src="js/foundation/foundation.placeholder.js"></script>
  <script src="js/foundation/foundation.reveal.js"></script>
  <script src="js/foundation/foundation.section.js"></script>
  <script src="js/foundation/foundation.tooltips.js"></script>
  <script src="js/foundation/foundation.topbar.js"></script>
  <script src="js/foundation/foundation.interchange.js"></script>
  
  <script>
    $(document).foundation();
  </script>
  
  
  </body>
</html>
