<?php 

if (isset($_GET['private']) && $_GET['private']==1) {
	
	$_SESSION['auth_cosmetica_ecologica'] = true;
	header('Location: '.URL_SITIO.COSMETICA_ECOLOGICA);

}

if (isset($_SESSION['auth_cosmetica_ecologica']) && ($_SESSION['auth_cosmetica_ecologica'])) {	

?>
<?php include "views/header.php"; ?>
<div class="container" id="content">
	<div class="col-xs-12">
		<h2 class="text-center">Conoce más sobre cosmética ecológica!</h2>
		<!-- 16:9 aspect ratio -->
		<div class="embed-responsive embed-responsive-16by9">
			<iframe src="https://player.vimeo.com/video/239532198" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>		
	</div>
</div>
<br>
<br>
<script type="text/javascript">
	
	$(document).ready(function(){

		$('#content').focus();

	})

</script>

<?php include "views/footer.php"; } else {

	header('Location: '.URL_SITIO);

	} ?>