<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/pos/css/bootstrap.css">

    <title>Hello, world!</title>
  </head>
  <body>
  	<?php if(isset($this->alerta) && !empty($this->alerta)) { ?>
  		<div class="alert alert-warning" role="alert">
		  <?=$this->alerta?>
		</div>
  	<?php } ?>
    