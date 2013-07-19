<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Foundation 4</title>

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="foundation/css/normalize.css" />
  <link rel="stylesheet" href="foundation/css/config_f_krd.css" />
  <link rel="stylesheet" href="foundation/css/foundation.css" />
  <link rel="stylesheet" href="foundation/css/orbit.css">
  <link rel="stylesheet" href="foundation/css/social_foundicons.css"/>  
  <link rel="stylesheet" href="foundation/css/social_foundicons_ie7.css"/>
  
</head>
<body>

	
<!-- Barra superior-->
<div class="contain-to-grid sticky"> 
	<nav class = "top-bar">   
	<ul class = "title-area">
		<li class = "name">
		<h1><a href="#"> <img src="foundation/img/D1.jpg">D'roche</a></h1>
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
							<img src="foundation/img/hotel444.jpg">
							<div class="orbit-caption">Descripcion de la imagen</div>
						</li>
						<li>
							<img src="foundation/img/hotel555.jpg">
							<div class="orbit-caption">Descripcion de la imagen</div>
						</li>
						<li>
							<img src="foundation/img/hotel777.jpg">
							<div class="orbit-caption">Descripcion de la imagen</div>
						</li>
					</ul>
					</div>
			</div>
		</div>
	  
		<!-- Panel Disponibilidad -->
		<div class="large-3 columns" >
			<div class="panel" style="width:240px; height:450px; background-color:#383838; border: black 1px solid; ">
				<h4 style="color:white; text-align:center;">Habitaciones Disponibles</h4><br>
				  <form>
					<h6 style="color:white;" > Fecha de entrada </h6>
					<div class="row collapse">						
						<div class="large-8 columns ">
							<input id="datepicker_entrada" type="text" placeholder="MM/DD/AAAA">
						</div>
					</div><br>
					
					
					<h6 style="color:white;" > Fecha de salida </h6>
					<div class="row collapse">						
						<div class="large-8 columns">					
							<input id="datepicker_salida" type="text" placeholder="MM/DD/AAAA">										 									
						</div>
					</div><br>
					
					
					<div class="row">
						<div class="large-12 columns" style="text-align:center;">
							<br> <a href="#" id="botones" class="button"  >Buscar</a>
						</div>
					</div>
					
					
					<div class="row" >
						<div class="large-12 columns" style="text-align:center;">
							<i class="foundicon-facebook"> <a href="#" > Like us on Facebook </a> </i>
							<i class="foundicon-twitter"> <a href="#" > Follow us on Twitter </a></i>
						</div>
					</div>								
				</form>		
			</div>
		</div>
		<hr/>
  
<!-- Three-up Content Blocks -->

	<div class="row">
		<div class="large-4 columns">
			<img src="foundation/img/hotel88.jpg" />
		  
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
			<img src="foundation/img/hotel99.jpg" />
		  
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
			<img src="foundation/img/hotel1010.jpg" />
		  
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
   <div id="footerr">
		<div style="color:white;font-size:13px;background-color:#383838;height:220px"> 
        <br>
               
			<div style="margin-left:230px; width:200px;float:left">
				
			<h3>¿Quienes Somos?</h3>   
		    <p> Rodeado del frondoso paisaje de un parque natural,
			 el Hesperia D'roche, de cinco estrellas, ofrece 
			 vistas a la resplandeciente arena blanca y al pacífico 
			 y cristalino mar. A sólo 35 minutos del aeropuerto de Isla Margarita</p>
			 </div>
				
				
			<div style="margin-left:150px; width:200px;float:left">
			<h3>¿Nuesta Vision?</h3>
		    <p> Rodeado del frondoso paisaje de un parque natural,
			 el Hesperia D'roche, de cinco estrellas, ofrece 
			 vistas a la resplandeciente arena blanca y al pacífico 
			 y cristalino mar. A sólo 35 minutos del aeropuerto de Isla Margarita</p>               
		     </div>
               
               
               
		    <div style="margin-left:150px; width:200px;float:left">
			<h3>¿Donde Estamos?</h3>
			<ul class="vcard" style="font-size:14px">
			<li class="fn">Salto Angel</li>
			<li class="street-address">123 Mata verde</li>
			<li class="locality">Venezuela</li>
			<li><span class="state">Carabobo/valencia</span> 
			<li><span class="zip">12345</span></li>
			<li class="email"><a href="#">baltazar@gmail.com</a></li>
			</ul>              
		    </div>
        </div>  
		<div style="background-color:#181818 ;height:30px"></div>                                  
	</div>
  
  
  <!-- Carga de script -->
    <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
 	<script src="foundation/js/jquery-1.9.1.js" type="text/javascript"></script> 
	<link rel="stylesheet" href="foundation/css/ui-lightness/jquery-ui.custom.css" />
	<script src="foundation/js/jquery-ui-1.10.3.custom.js"></script>
	<script src="foundation/js/jquery-ui-1.10.3.custom.min.js"></script>

	<script>
	  $(function() {
		$("#datepicker_entrada" ).datepicker();
	  });
	 </script> 
	 
	<script>
	  $(function() {
		$("#datepicker_salida" ).datepicker();
	  });
	 </script> 			 
			 
  
  <script src="foundation/js/vendor/custom.modernizr.js"></script>
  <script src="foundation/js/foundation.min.js"></script>
  <script src="foundation/js/foundation/foundation.js"></script>
  <script src="foundation/js/foundation/foundation.alerts.js"></script>
  <script src="foundation/js/foundation/foundation.clearing.js"></script>
  <script src="foundation/js/foundation/foundation.cookie.js"></script>
  <script src="foundation/js/foundation/foundation.dropdown.js"></script>
  <script src="foundation/js/foundation/foundation.forms.js"></script>
  <script src="foundation/js/foundation/foundation.joyride.js"></script>
  <script src="foundation/js/foundation/foundation.magellan.js"></script>
  <script src="foundation/js/foundation/foundation.orbit.js"></script>
  <script src="foundation/js/foundation/foundation.placeholder.js"></script>
  <script src="foundation/js/foundation/foundation.reveal.js"></script>
  <script src="foundation/js/foundation/foundation.section.js"></script>
  <script src="foundation/js/foundation/foundation.tooltips.js"></script>
  <script src="foundation/js/foundation/foundation.topbar.js"></script>
  <script src="foundation/js/foundation/foundation.interchange.js"></script>
  
  <script>
    $(document).foundation();
  </script>
  
  
  </body>
</html>
