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
			<li class="email"><a id = "correo">baltazar@gmail.com</a></li>
			</ul>              
		    </div>
        </div>  
		<div style="background-color:#181818 ;height:50px">
			<div class="large-12 columns" style="text-align:center;">	
							
	<a   href="index.php/hotel/hotel/"> <img src="application/views/hotel_vw/config/img/twitter.png" style="width:40px;height:40px;" > </a>
	<a   href="index.php/hotel/hotel/"> <img src="application/views/hotel_vw/config/img/facebook.png" style="margin-left:10px; width:40px;height:40px;" > </a>
	<a   href="index.php/hotel/contactar/"> <img src="application/views/hotel_vw/config/img/mail.png" style="margin-left:10px;width:50px;height:40px;" > </a>
							
			</div>		
		 <br>
		 </div>                                 
	</div>
  
  
  <!-- Carga de script -->

	<script>
		
		
	  $(function() {
		
		$("#datepicker_entrada" ).datepicker({ 
			dateFormat: "yy-mm-dd" ,
			dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
			dayNamesMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			dayNamesShort:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			
			monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]
		}); 
		
		});
		
		
	 </script> 
	 
	<script>
	  $(function() {
		$("#datepicker_salida" ).datepicker({ 
			dateFormat: "yy-mm-dd" ,
			dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
			dayNamesMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			dayNamesShort:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
			
			monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]
		}); 
	  });
	 </script> 			 
			 
  
  <script src="application/views/hotel_vw/config/js/vendor/custom.modernizr.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation.min.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.alerts.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.clearing.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.cookie.js"></script><script src="application/views/hotel_vw/config/js/foundation/foundation.abide.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.dropdown.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.forms.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.joyride.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.magellan.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.orbit.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.placeholder.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.reveal.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.section.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.tooltips.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.topbar.js"></script>
  <script src="application/views/hotel_vw/config/js/foundation/foundation.interchange.js"></script>
  
  <div class="reveal-modal-bg" style="display: none"></div>
  
  <script>
    $(document).foundation()
     .foundation('abide', {
	
	live_validate : true,
	focus_on_invalid : true,
	timeout : 1000,
	
	patterns : {
    alpha: /[a-zA-Z]+/,
    alpha_numeric : /[a-zA-Z0-9]+/,
    integer: /-?\d+/,
    number: /-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?/,

    // generic password: upper-case, lower-case, number/special character, and min 8 characters
/*
    password_valid : /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
*/
	password: /[a-zA-Z0-9]+/,

    // amex, visa, diners
    card : /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/,
    cvv : /^([0-9]){3,4}$/,

    // http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#valid-e-mail-address
    email : /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,

    url: /(https?|ftp|file|ssh):\/\/(((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?/,
    // abc.de
    domain: /^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$/,

    datetime: /([0-2][0-9]{3})\-([0-1][0-9])\-([0-3][0-9])T([0-5][0-9])\:([0-5][0-9])\:([0-5][0-9])(Z|([\-\+]([0-1][0-9])\:00))/,
    // YYYY-MM-DD
    date: /(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))/,
    // HH:MM:SS
    time : /(0[0-9]|1[0-9]|2[0-3])(:[0-5][0-9]){2}/,
    dateISO: /\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}/,
    // MM/DD/YYYY
    month_day_year : /(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/,

    // #FFF or #FFFFFF
    color: /^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/
    }
  });
  </script>
 
 
  
  </body>
</html>
