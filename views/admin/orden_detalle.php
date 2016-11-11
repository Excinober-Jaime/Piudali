<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">


	<div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!--<h5></h5>-->
                                    <address>
                                        <strong>LINK GRUPO MARKETING SAS</strong><br>
                                        Cali, Colombia<br>
                                        (+57)(2) 524 1887 - (+57) 311 627 9068<br>
                                        contacto@piudali.com.co<br>
                                        <!--<abbr title="Phone">P:</abbr> (123) 601-4590-->
                                    </address>
                                    <form method="post">
										<div class="form-group">
											<label>Estado:</label>
											<?php 
												if($orden["detalle"]["estado"] == "FACTURADO") { 
													$disabled = "disabled"; 
													echo '<input type="hidden" name="estado" value="'.$orden["detalle"]["estado"].'">';
												}else{
													$disabled = "";
												} 
												?>
											<select name="estado" class="input-sm" <?=$disabled?>>
											<?php 
												foreach ($estados as $key => $estado) {
													?>
													<option value="<?=$estado?>" <?php if($estado == $orden["detalle"]["estado"]) echo "selected"; ?>><?=$estado?></option>
													<?php
												}
											?>	
											</select>
										</div>
										<div class="form-group">
											<label>Número de Factura:</label>
											<input type="text" name="num_factura" class="form-control input-sm" value="<?=$orden["detalle"]["num_factura"]?>">
										</div>
										<div class="form-group">
											<label>Número de Guía:</label>
											<input type="text" name="guia_flete" class="form-control input-sm" value="<?=$orden["detalle"]["guia_flete"]?>">
										</div>										
										<button type="submit" name="actualizar_orden" class="btn btn-primary center-block">ACTUALIZAR</button>
									</form>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <h4>ORDEN No.</h4>
                                    <h4 class="text-navy"><?=$orden["detalle"]["num_orden"]?><br></h4>
                                    <!--<span>A:</span>-->
                                    <address>
                                        <strong><?=$orden["detalle"]["nombre"]." ".$orden["detalle"]["apellido"]?><br>
                                        <?=$orden["detalle"]["num_identificacion"]?></strong><br>                                       
                                        <?=$orden["detalle"]["direccion"]?><br>
                                        <?=$orden["detalle"]["ciudad"]?><br>
                                        <?=$orden["detalle"]["telefono"]?><br>
                                        <?=$orden["detalle"]["telefono_m"]?><br>
                                    </address>
                                    <p>
                                        <span><strong>Fecha de pedido:</strong> <?=$orden["detalle"]["fecha_pedido"]?></span><br/>
                                        <!--<span><strong>Due Date:</strong> March 24, 2014</span>-->
                                    </p>                                    
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									foreach ($orden["productos"] as $key => $producto) {
									?>										
										<tr>
	                                        <td>
	                                        	<div><strong><?=$producto["nombre_producto"]?></strong></div>
	                                            <small><?=$producto["cod_producto"]?></small>
	                                        </td>
	                                        <td><?=$producto["cantidad"]?></td>
	                                        <td><?=$producto["precio"]?></td>                                        
	                                    </tr>
									<?php
									}
									?>                                    
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>Subtotal Antes de Iva:</strong></td>
                                    <td><?=convertir_pesos($orden["detalle"]["subtotal"])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Descuentos Cupón:</strong></td>
                                    <td><?=convertir_pesos($orden["detalle"]["descuentos"])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Descuento Escala %:</strong></td>
                                    <td><?=$orden["detalle"]["porc_escala"]?>%</td>
                                </tr>
                                <tr>
                                    <td><strong>Descuento Escala $:</strong></td>
                                    <td><?=convertir_pesos($orden["detalle"]["desc_escala"])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Total Neto Antes de Iva:</strong></td>
                                    <td><?=convertir_pesos($orden["detalle"]["neto_sin_iva"])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Iva:</strong></td>
                                    <td><?=convertir_pesos($orden["detalle"]["impuestos"])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Flete:</strong></td>
                                    <td><?=convertir_pesos($orden["detalle"]["costo_envio"])?></td>
                                </tr>
                                <tr>
                                    <td><strong>Total:</strong></td>
                                    <td><?=convertir_pesos($orden["detalle"]["total"])?></td>
                                </tr>
                                </tbody>
                            </table>
                            <!--<div class="text-right">
                                <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                            </div>-->

                            <!--<div class="well m-t"><strong>Comments</strong>
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                            </div>-->
                        </div>





	<!--<div class="row">
        <div class="col-lg-12">
			<div class="col-xs-12 col-md-6">
				<div class="well well-sm"><b>Subtotal Antes de Iva:</b> $<?=number_format($orden["detalle"]["subtotal"])?></div>
				<div class="well well-sm"><b>Descuentos Cupón:</b> $<?=number_format($orden["detalle"]["descuentos"])?></div>
				<div class="well well-sm"><b>Descuento Escala %:</b> <?=$orden["detalle"]["porc_escala"]?>%</div>
				<div class="well well-sm"><b>Descuento Escala $:</b> $<?=number_format($orden["detalle"]["desc_escala"])?></div>
				<div class="well well-sm"><b>Total Neto Antes de Iva:</b> $<?=number_format($orden["detalle"]["neto_sin_iva"])?></div>
				<div class="well well-sm"><b>Iva:</b> $<?=number_format($orden["detalle"]["impuestos"])?></div>
				<div class="well well-sm"><b>Flete:</b> $<?=number_format($orden["detalle"]["costo_envio"])?></div>			
				<div class="well well-sm"><b>Total:</b> $<?=number_format($orden["detalle"]["total"])?></div>			
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="well well-sm"><b>Número de Orden:</b> <?=$orden["detalle"]["num_orden"]?></div>
				<div class="well well-sm"><b>Fecha:</b> <?=$orden["detalle"]["fecha_pedido"]?></div>
				<form method="post">
				<div class="well well-sm"><b>Estado:</b> 
					<select name="estado" class="input-sm" <?php if($orden["detalle"]["estado"] == "FACTURADO"){ echo "disabled"; } ?>>
					<?php 
						foreach ($estados as $key => $estado) {
							?>
							<option value="<?=$estado?>" <?php if($estado == $orden["detalle"]["estado"]) echo "selected"; ?>><?=$estado?></option>
							<?php
						}
					?>	
					</select>
				</div>
				<div class="well well-sm"><b>Número de Factura:</b>
					<input type="text" name="num_factura" class="form-control input-sm" value="<?=$orden["detalle"]["num_factura"]?>">
				</div>
				<div class="well well-sm"><b>Número de Guía:</b>
					<input type="text" name="guia_flete" class="form-control input-sm" value="<?=$orden["detalle"]["guia_flete"]?>">
				</div>
				<button type="submit" name="actualizar_orden" class="btn btn-primary center-block">ACTUALIZAR</button>
				</form>
			</div>
			<div class="col-xs-12">
				<h2>Productos</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-center">DESCRIPCIÓN</th>
							<th class="text-center">CANTIDAD</th>
							<th class="text-center">PRECIO</th>					
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($orden["productos"] as $key => $producto) {
						?>
							<tr>
								<td><?=$producto["cod_producto"]." - ".$producto["nombre_producto"]?></td>
								<td class="text-center"><?=$producto["cantidad"]?></td>
								<td class="text-center"><?=$producto["precio"]?></td>						
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>	
		</div>
	</div>-->
</div>
<?php include "footer.php"; ?>