<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-6">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <div>
                <?php
                if (count($mensajes_ticket)>0) {
                ?>
	                <div class="chat-activity-list">
	                    
	                <?php
	                foreach ($mensajes_ticket as $key => $mensaje) {

	                if ($mensaje["emisor"]=="EMPRESA") {
	                	$orientacion = "right";
	                }else{
	                	$orientacion = "left";
	                }
	                ?>
	                	<div class="chat-element <?=$orientacion?>">
	                        <!--<a href="#" class="pull-left">
	                            <img alt="image" class="img-circle" src="img/a2.jpg">
	                        </a>-->
	                        <div class="media-body text-<?=$orientacion?>">
	                            <!--<small class="pull-right text-navy">1m ago</small>-->
	                            <strong>
		                            <?php if ($mensaje["emisor"]=="EMPRESA") {
		                            	echo "Piudalí";
		                            }else{
		                            	echo $ticket["usuario"]["nombre"];
		                            } ?>
	                            </strong>
	                            <p class="m-b-xs">
	                                <?=$mensaje["mensaje"]?>
	                            </p>
	                            <small class="text-muted"><?=$mensaje["fecha_registro"]?></small>
	                        </div>
	                    </div>
	                <?php
	                }
	                ?>
	                </div>
                <?php
                }
                ?>
                </div>
                    <div class="chat-form">
                        <form role="form" method="post">
                            <div class="form-group">
                                <textarea class="form-control" name="mensaje" placeholder="Mensaje"></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" name="agregarMensaje" class="btn btn-sm btn-primary m-t-n-xs"><strong>Enviar Mensage</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div>
                        <h1><?=$ticket["tipo"]?></h1>
                        <h3>Código: <?=$ticket["codigo"]?></h3>
                        <p class="m-t"><?=$ticket["descripcion"]?></p>
                        <p class="m-t">Fecha de registro: <?=$ticket["fecha_registro"]?></p>
                        <hr>
                        <p class="m-t">Estado</p>
                        <form method="post">
                            <select name="estado" class="form-control">
                                <option value="ABIERTO" <?php if ($ticket["estado"]=='ABIERTO') { echo 'selected'; } ?>>ABIERTO</option>
                                <option value="EN PROCESO" <?php if ($ticket["estado"]=='EN PROCESO') { echo 'selected'; } ?>>EN PROCESO</option>
                                <option value="CERRADO" <?php if ($ticket["estado"]=='CERRADO') { echo 'selected'; } ?>>CERRADO</option>
                            </select><br>
                            <button type="submit" name="actualizarEstado" class="btn btn-primary btn-sm">ACTUALIZAR</button>
                        </form>
                    </div>
                </div>
            </div>
       	</div>               

	</div>
</div>
<?php include "footer.php"; ?>