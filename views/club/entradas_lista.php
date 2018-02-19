<?php include 'header.php'; ?>

<div class="section" id="enterate">
	<div class="row">
		<h2 class="center-align">Entérate</h2>
		<?php foreach ($entradas as $key => $entrada) { ?>

			<div class="col s12 m3">
				<div class="card hoverable">
			    	<div class="card-image waves-effect waves-block waves-light">
		<?php
			
			if ($entrada['tipo'] == 'IMAGEN') {
		?>
						 <a href="<?=URL_CLUB.'/'.URL_CLUB_ENTRADAS.'/'.$entrada['url']?>" >
						 	<img class="activator" src="<?=$entrada['ruta']?>">
						 </a>
		<?php
			}elseif ($entrada['tipo'] == 'VIDEO'){
		?>
						<div class="video-container">
					        <iframe src="<?=$entrada['ruta']?>" frameborder="0" allowfullscreen></iframe>
					    </div>
		<?php } ?>

					</div>
				    <div class="card-content" style="height: 300px;overflow-y: auto;">
				      <span class="card-title activator grey-text text-darken-4"><?=$entrada['titulo']?><!--<i class="material-icons right">more_vert</i>--></span>
				      <p>
				      	<?=substr($entrada['contenido'], 0, 250)?>...
				      </p>
				    </div>
				    <div class="card-action">
		              <a href="<?=URL_CLUB.'/'.URL_CLUB_ENTRADAS.'/'.$entrada['url']?>" clas="activator">Continuar leyendo...</a>
		            </div>
				   
				 </div>
			</div>

		<?php } ?>
	</div>
</div>

<?php include 'footer.php'; ?>