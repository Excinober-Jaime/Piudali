<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>
    <div class="contenPanel">	
        <div class="col-xs-12 titulo">
        <h1>Premios</h1>
        <small>Adquierelos pagando con tus puntos o cualquier otro medio de pago</small>
        <br/><br/>
        <div class="row">
                <?php
                foreach ($premios as $premio) {
    
                    producto_bloque($premio["img_principal"],$premio["nombre"],$premio["codigo"],$premio["tipo"],$premio["precio"],$premio["precio_oferta"],$premio["url"],"col-sm-4");
                }
                ?>
            </div>
        </div>	
    </div>	
</div>
<br>
<br>
<?php include "footer.php"; ?>
