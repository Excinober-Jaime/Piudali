<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<div class="container">
<div class="row">
  <div class="col-xs-6">
    <img src="http://piudali.com.co/assets/img/logo-piudali.png" class="img-responsive center-block">
  </div>
  <div class="col-xs-6">
    <img src="http://linkgrupomarketing.com/images/logo.png" class="img-responsive center-block">
  </div>
</div>
  <div class="row">
    <div class="col-xs-12">
    <!-- AREA CONTENIDO-->

   		<!-- INFORMACION-->
		 <h3>Respuesta de la Transacci&oacute;n</h3>
        <?php
        $ApiKey="28tuaar72n6g65ervovdl1sst";/////llave de usuario de pruebas 2 6u39nqhq8ftd0hlvnjfs66eh8c
        $merchant_id=502548;
        $referenceCode=$_REQUEST['referenceCode'];
        $TX_VALUE=$_REQUEST['TX_VALUE'];
        $New_value=number_format($TX_VALUE, 1, '.', "");
        $currency=$_REQUEST['currency'];
        $transactionState=$_REQUEST['transactionState'];
        $firma_cadena= "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
        $firmacreada = md5($firma_cadena);//firma que generaron ustedes
        $firma =$_REQUEST['signature'];//firma que envía nuestro sistema 
        $reference_pol=$_REQUEST['reference_pol'];//codigo de la compra
        $cus=$_REQUEST['cus'];
        $extra1=$_REQUEST['description'];
        $pseBank=$_REQUEST['pseBank'];
        $lapPaymentMethod=$_REQUEST['lapPaymentMethod'];
        $transactionId=$_REQUEST['transactionId'];
        if($_REQUEST['polResponseCode'] == 5)
        {$estadoTx = "Transacci&oacute;n declinada por la entidad financiera.";}
        else if($_REQUEST['polResponseCode'] == 6)
        {$estadoTx = "Fondos Insuficientes";}
        else if($_REQUEST['polResponseCode'] == 7)
        {$estadoTx = "Tarjeta Invalida";}
        else if($_REQUEST['polResponseCode'] == 4)
        {$estadoTx = "Transacci&oacute;n rechazada por la Entidad";}
        else if($_REQUEST['polResponseCode'] == 9994)
        {$estadoTx = "Operacion Pendiente de Finalizacion";}
        else if($_REQUEST['polResponseCode'] == 1)
        {$estadoTx = "Transacci&oacute;n Aprobada";}
        else if($_REQUEST['polResponseCode'] == 17)
        {$estadoTx = "Monto excede máximo permitido por entidad.";}
        else if($_REQUEST['polResponseCode'] == 9)
        {$estadoTx = "Tarjeta vencida.";}
        else if($_REQUEST['polResponseCode'] == 22)
        {$estadoTx = "Tarjeta no autorizada para realizar compras por internet.";}
        else if($_REQUEST['polResponseCode'] == 25)
        {$estadoTx = "Transaccion Pendiente.";}
        else
        {$estadoTx=$_REQUEST['mensaje'];}
        if(strtoupper($firma)==strtoupper($firmacreada)){//comparacion de las firmas para comprobar que los datos si vienen de Pagosonline

        ?>
        <table class="table table-striped">
          <tr>
            <td>Estado de la transaccion</td>
            <td><?php echo $estadoTx; ?> </td>
          </tr>          
          <tr>
            <td>ID de la transaccion</td>
            <td><?php echo $transactionId; ?> </td>
          </tr>
          <tr>
            <td>referencia de la venta </td>
            <td><?php echo $reference_pol; ?> </td> </tr>
          <tr>
            <td>Referencia de la transaccion </td>
            <td><?php echo $referenceCode; ?> </td>
          </tr>
          <?php
          if($banco_pse!=null){
          ?>
          <tr>
            <td>cus </td>
            <td><?php echo $cus; ?> </td>
          </tr>
          <tr>
            <td>Banco </td>
            <td><?php echo $pseBank; ?> </td>
          </tr>
          <?php
          }
          ?>
          <tr>
            <td>Valor total</td>
            <td>$<?php echo number_format($TX_VALUE); ?> </td>
          </tr>
          <tr>
            <td>moneda </td>
            <td><?php echo $currency; ?></td>
          </tr>
          <tr>
            <td>Descripción:</td>
            <td><?php echo ($extra1); ?></td>
          </tr>
          <tr>
            <td>Entidad:</td>
            <td><?php echo ($lapPaymentMethod); ?></td>
          </tr>
        </table>
        <?php

        }else{
        ?>

        <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <th width="100%" scope="col"><h1>Error validando firma digital.</h1></th>          
          </tr>
        </table>
        <?php
        }
        ?> 
        <a href="http://piudali.com.co/" style="text-decoration: none;">
          <button class="btn btn-primary btn-lg center-block">REGRESAR A PIUDALI</button> 
        </a>
        </div>
      </div>
      </div>
      <br>
      <br>
      <footer class="container-fluid footer">
        <p class="text-center">REPRESENTANTE Y DISTRIBUIDOR AUTORIZADO PARA COLOMBIA<br>
                                Por Waliwa Amazonian Natural Products Ltda.<br>
                                Para la marca PIUDALI AMAZONIAN SKINCAR<br><br>
                                Teléfono: (+57)(2) 524 1887 - (+57) 311 627 9068 | Email: contacto@piudali.com.co
        </p>
      </footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
 