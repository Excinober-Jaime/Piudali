<?php include 'header.php'; ?>
<div class="parallax-container" id="sobre-el-club">
  <div class="parallax"><img src="http://localhost/piudali/www/assets/club/img/banner1.png">
    <!--<div class="container">
      <div class="card" style="background-color: rgba(225,225,225,0.9);top: 100px;">
        <div class="card-content black-text">
          <span class="card-title">PREMIAMOS LA FIDELIDAD DE NUESTROS CLIENTES</span>
          <p>A través del CLUB PIUDALI, acumula puntos que puedes redimir en premios, productos y servicios. Entérate de tips, noticias, eventos y promociones especiales para nuestros clientes.</p>
        </div>            
      </div>
    </div>-->
  </div>
</div>
<div class="divider"></div>
<div class="row" id="premios">
	<h2 class="center-align orange-text text-darken-2">Premios</h2>
	<div class="row">
	<?php

		if (count($productos_club)>0) {

			foreach ($productos_club as $key => $producto) {
	
				if ($key == 8) {
					break;
				}
	?>
				<div class="col s12 m4 l3">
				  <div class="card">
        			<div class="card-image">
				      <img src="<?=$producto['img_principal']?>">
				      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="<?=URL_CLUB.'/'.URL_CLUB_PRODUCTO.'/'.$producto['url']?>"><i class="material-icons">add</i></a>
				    </div>
				    <div class="card-content">
				    	<span class="card-title teal-text text-darken-4"><?=$producto['nombre']?></span>				      	
				    </div>
				  </div>
				</div>

	<?php
			}
		}
	?>
	</div>
	
	
	<center>
		<a class="waves-effect green darken-1 btn-large"><i class="material-icons right">cloud</i>Más Premios</a>			
	</center>
</div>
<!--<div class="divider"></div>
<div class="row" id="donaciones">
	<h2 class="center-align">Donaciones</h2>
</div>-->
<div class="divider"></div>
<div class="row" id="enterate">
	<h2 class="center-align orange-text text-darken-2">Entérate</h2>
	<div class="col s12 m4">
		<div class="card hoverable">
		    <div class="card-image waves-effect waves-block waves-light">
		      <img class="activator" src="http://piudali.com.co/assets/img/paginas/COMPROMISO%20SOCIAL%20PIUDALI-01.png">
		    </div>
		    <div class="card-content">
		      <span class="card-title activator grey-text text-darken-4">Lorem Ipsum<i class="material-icons right">more_vert</i></span>
		      <p>
		      	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      	tempor incididunt ut labore et dolore magna aliqua.
		      </p>        
		    </div>
		     <div class="card-action">
              <a href="#">This is a link</a>
            </div>
		    <div class="card-reveal">
		      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
		      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		      cillum dolore eu fugiat nulla pariatur.</p>
		    </div>
		 </div>
	</div>
	<div class="col s12 m4">
		<div class="card hoverable">
		    <div class="card-image waves-effect waves-block waves-light">
		      <img class="activator" src="http://piudali.com.co/assets/img/banners/A%20CIENCIA%20CIERTA%20BIO-HOME-02-02.jpg">
		    </div>
		    <div class="card-content">
		      <span class="card-title activator grey-text text-darken-4">Lorem Ipsum<i class="material-icons right">more_vert</i></span>
		      <p>
		      	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      	tempor incididunt ut labore et dolore magna aliqua.
		      </p>        
		    </div>
		     <div class="card-action">
              <a href="#">This is a link</a>
            </div>
		    <div class="card-reveal">
		      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
		      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		      cillum dolore eu fugiat nulla pariatur.</p>
		    </div>
		 </div>
	</div>
	<div class="col s12 m4">
		<div class="card hoverable">
		    <div class="card-image waves-effect waves-block waves-light">
		      <img class="activator" src="http://localhost/piudali/www/assets/img/paginas/DISTRIBUIDORES%20DIRECTOS%20PIUDALI.png">
		    </div>
		    <div class="card-content">
		      <span class="card-title activator grey-text text-darken-4">Lorem Ipsum<i class="material-icons right">more_vert</i></span>
		      <p>
		      	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      	tempor incididunt ut labore et dolore magna aliqua.
		      </p>        
		    </div>
		     <div class="card-action">
              <a href="#">This is a link</a>
            </div>
		    <div class="card-reveal">
		      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
		      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		      cillum dolore eu fugiat nulla pariatur.</p>
		    </div>
		 </div>
	</div>
</div>
<div class="divider"></div>
<div class="row" id="donde-comprar">
	<h2 class="center-align orange-text text-darken-2">¿Dónde Redimir Tus Puntos?</h2>
	<div class="row">
		<div class="input-field col s12 m4">
		    <select>
		      <option value="" disabled selected>Selecciona una ciudad</option>
		      <option value="1">Bogotá</option>
		      <option value="2">Cali</option>
		    </select>
		    <label>¿Dónde deseas redimir tus puntos?</label>
		</div>
	</div>
    <div class="divider"></div>
   	<div class="row">
   		<div class="col s12 m4">
			<ul class="collection with-header">
			<?php 
			foreach ($distribuidores as $key => $distribuidor) {
			?>
			<li class="collection-item avatar tienda" iddistribuidor="<?=$distribuidor["idusuario"]?>">	      
			  <span class="title"><?=$distribuidor["nombre"]?></span>
			  <p class="grey-text">
			     <?=$distribuidor["direccion"]?> - <?=$distribuidor["ciudad"]?><br><?=$distribuidor["telefono"]." - ".$distribuidor["telefono_m"]?>
			  </p>
			  <a href="#!" class="secondary-content"><i class="material-icons">location_on</i></a>
			</li>
			<?php
			}
			?>
			</ul>
  		</div>
	  	<div class="col s12 m8" style="height: 500px;">
	  		
			<div id="map" style="width: 100% !important; height: 100% !important;"></div>
			
	  	</div>
  	</div>
</div>
<div class="divider"></div>
<div class="row" id="preguntas-frecuentes">
	<h2 class="center-align  orange-text text-darken-2">Preguntas Frecuentes</h2>
	<div class="container">
		<p class="flow-text center-align grey-text text-darken-2">Pensamos en lo importante y valioso que es para nosotros tu interés en hacer parte de nuestro selecto grupo de clientes, conoce todo lo que necesitas para redimir tus puntos por compras en nuestra plataforma CLUB PIUDALI.<br><br>Selecciona una categoría y encuentra la pregunta de tu interés.</p>
		<ul class="collapsible" data-collapsible="accordion">
		    <li>
		      <div class="collapsible-header"><i class="material-icons">question_answer</i>¿Cómo puedo registrarme?</div>
		      <div class="collapsible-body"><span>Ingresa en el link xxxxx y registra los datos del formulario, con tu contraseña. Una vez registrado llegará a al correo electrónico tu usuario y contraseña registrada.</span></div>
		    </li>
		    <li>
		      <div class="collapsible-header"><i class="material-icons">question_answer</i>¿Cómo puedo actualizar mis datos?</div>
		      <div class="collapsible-body"><span>Una vez te registras, inicias sesión con tu usuario (correo electrónico registrado) y la contraseña para ingresar al perfil de usuario. Edita tus datos, actualiza y guarda tus datos.</span></div>
		    </li>
		    <li>
		      <div class="collapsible-header"><i class="material-icons">question_answer</i>¿Por qué mi dirección, celular y teléfono son campos obligatorios?</div>
		      <div class="collapsible-body"><span>Tu dirección es un campo obligatorio, porque en caso de escoger un premio para envío a domicilio debemos tener los datos actualizados para evitar devoluciones que te causan sobre costo por reenvío.<br>
				Tus datos de teléfonos son vitales para establecer comunicación para consulta o dar respuesta oportuna a tus peticiones, quejas, reclamaciones o solicitudes.</span></div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>¿Cómo puedo recuperar mi contraseña?</div>
		    	<div class="collapsible-body">
		    	<span>
		    		Tu contraseña la puede recuperar en la opción olvide mi contraseña en la zona de iniciar sesión de usuario, digitando el correo registrado. La contraseña llega automáticamente.
		    	</span>
		    	</div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>En qué consiste el CLUB PIUDALI?</div>
		    	<div class="collapsible-body">
			    	<span>
			    		CLUB PIUDALI es una plataforma de fidelización diseñada especialmente para relacionarnos permanentemente con nuestros clientes finales, que usan nuestra marca.<br>
						<b>BENEFICIOS DEL CLUB PIUDALI</b><br><br>
					</span>
					<ol>
						<li>A través del CLUB PIUDALI, puedes acumular puntos por las compras que realices en cualquier canal de ventas, tradicional como puntos de ventas o compras virtuales.</li>
						<li>Los puntos los podrás redimir en el catálogo de premios disponibles en la plataforma.</li>
						<li>Adicionalmente contarás con contenidos de tu interés y novedades de la marca.</li>
						<li>Invitaciones a eventos desarrollados por la marca, o por nuestros Distribuidores</li>
						<li>Notificación de ofertas especiales para clientes fieles.</li>
					</ol>
		    	
		    	</div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>¿Cómo me entero de las actividades del CLUB PIUDALI?</div>
		    	<div class="collapsible-body">
		    	
					<ol>
						<li>A través de la plataforma virtual contarás con tips, noticias, testimoniales, premiaciones, concursos, promociones y eventos.</li>
						<li>A través de las redes sociales y por correo electrónico enviaremos boletines de noticias.</li>
						<li>A través de tu datos de contacto</li>
					</ol>	    	
		    	</div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>¿Puedo recibir los beneficios en todo Colombia?</div>
		    	<div class="collapsible-body">
		    	<ol>
		    		<li>Los premios redimidos con puntos se envían a toda Colombia con flete gratuito.</li>
		    		<li>Aplican los términos y condiciones registrados en cada premio.</li>
		    		<li>Los puntos redimidos en establecimiento aliados solo aplican para los que están registrados en la plataforma.</li>
		    	</ol>		    		
		    	</div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>¿Cómo gano los puntos por compras?</div>
		    	<div class="collapsible-body">
		    	<ol>
		    		<li>Por cada compra que realices en cualquier canal de ventas, acumulas puntos.</li>
		    		<li>Cada producto tiene en el empaque un código QR que registra el valor en puntos.</li>
		    		<li>Los códigos QR contienen datos en números y letras.</li>
		    	</ol>
		    	</div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>¿Cómo acumulo los puntos en la plataforma?</div>
		    	<div class="collapsible-body">
		    	<ol>
		    		<li>Inicias sesión con tu usuario y contraseña</li>
		    		<li>Agregas los códigos QR de cada empaque</li>
		    		<li>Una vez agregas los códigos de cada empaque el código inhabilitado para volver a ingresarlo.</li>
					<li>Cada vez que ingresas un código suma a tu banco de puntos.</li>
		    	</ol>
		    	</div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>¿Cómo redimo mis puntos en la plataforma?</div>
		    	<div class="collapsible-body">
		    	<ol>
		    		<li>Inicias sesión con tu usuario y contraseña</li>
		    		<li>Puedes redimir agregando un premio del catálogo virtual al carro de compras y los puntos se abonaran de acuerdo al valor del premio, en caso que no tengas puntos suficientes puedes pagar el excedente con cualquier medio de pago disponible.</li>
		    		<li>Puedes donar tus puntos a las fundaciones disponibles en la plataforma, y los certificados estarán disponibles para verificación y garantía de los usuarios donantes.</li>
		    	</ol>
		    	</div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>¿Cómo redimir mis puntos en establecimientos aliados?</div>
		    	<div class="collapsible-body">
		    	<ol>
		    		<li>Puede redimir tus puntos presentando tu cédula en cualquiera de los puntos disponibles en alianza estratégica.</li>
		    		<li>Los establecimientos aliados son los registrados en la plataforma.</li>
		    		<li>Una vez redimes los puntos en un establecimiento se descuentan de tu saldo disponible.</li>
		    		<li>Podrás usar parcial o total en valor en punto.</li>
		    		<li>En caso que comprar un producto por mayor valor en un establecimiento deberás pagar en excedente en dinero por tu cuenta.</li>
		    	</ol>
		    	</div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>¿Mi banco de puntos?</div>
		    	<div class="collapsible-body">
		    	<ol>
		    		<li>Inicias sesión con tu usuario y contraseña.</li>
		    		<li>El banco de puntos te muestra los puntos abonados, los redimidos y vencidos.</li>
		    		<li>Los puntos vencen en el término de un año a partir de la fecha de emisión</li>
		    	</ol>
		    	</div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>¿Puedo ceder mis puntos?</div>
		    	<div class="collapsible-body">
		    	<ol>
		    		<li>La cuenta de usuario es permitida para personas mayores de edad.</li>
		    		<li>No se puede transferir la cuenta ni ceder puntos a otros usuarios activos.</li>
		    	</ol>
		    	</div>
		    </li>
		    <li>
		      	<div class="collapsible-header"><i class="material-icons">question_answer</i>¿Qué debo hacer cuando tengo una sugerencia o reclamo sobre algún producto, premio o del plan de beneficios?</div>
		    	<div class="collapsible-body">
		    	<ol>
		    		<li>Debes diligenciar tu comentario en la sección “Contáctanos”, allí describe
detalladamente tu inquietud y pronto te daremos solución, uno de nuestros asesores te ayudará en plazo no mayor a 24 horas.</li>
		    		<li>Puedes comunicarte a la línea de servicio (2)5241887 o 3116279068.</li>
		    		<li>Puedes comunicarte a través del chat en línea.</li>
		    	</ol>
		    	</div>
		    </li>
	  	</ul>
	</div>
</div>
<div class="divider"></div>
<div class="row" id="contacto">
	<h2 class="center-align orange-text text-darken-2">Contácto</h2>
	<div class="container">
		<form method="post" class="col s12 m10 l8 offset-l2 offset-m1">
			<div class="row">		      	
		        <div class="input-field col s6">
		          <input id="nombre" nombre="nombre" type="text" class="validate" required="required">
		          <label for="nombre">Nombre</label>
		        </div>
		        <div class="input-field col s6">
		          <input id="apellido" name="apellido" type="text" class="validate" required="required">
		          <label for="apellido">Apellido</label>
		        </div>
		    </div>
		    <div class="row">		      	
		        <div class="input-field col s12">
		          <input id="email" type="email" name="email" class="validate" required="required">
		          <label for="email">Email</label>
		        </div>
		    </div>
		    <div class="row">		      	
		        <div class="input-field col s12">
		          <input id="telefono" type="text" name="telefono" class="validate" required="required">
		          <label for="telefono">Teléfono</label>
		        </div>
		    </div>
		    <div class="row">		      	
		        <div class="input-field col s12">
		          <textarea id="mensaje" name="mensaje" class="materialize-textarea" required="required"></textarea>
		          <label for="mensaje">Mensaje</label>
		        </div>
		    </div>
		    <center>
		    	<button class="btn-large orange">ENVIAR</button>
		    </center>
		</form>
	</div>
</div>
<?php include 'footer.php'; ?>