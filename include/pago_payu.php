<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pago Payu</title>
</head>
<body onload="enviar_form()">
	<form method="post" action="https://gateway.payulatam.com/ppp-web-gateway/" id="form">
	    <input type="hidden" name="merchantId" id="merchantId" value="<?=$merchantId?>">
	    <input type="hidden" name="ApiKey" id="ApiKey" value="<?=$ApiKey?>">
	    <input type="hidden" name="referenceCode" id="referenceCode" value="<?=$referenceCode?>">
	    <!--<input type="hidden" name="accountId" id="accountId" value="">-->
	    <input type="hidden" name="description" id="description" value="<?=$description?>">
	    <input type="hidden" name="currency" id="currency" value="<?=$currency?>">
	    <input type="hidden" name="buyerEmail" id="buyerEmail" value="<?=$buyerEmail?>">
	    <input type="hidden" name="amount" id="amount" value="<?=$amount?>">
	    <input type="hidden" name="tax" id="tax" value="<?=$tax?>">
	    <input type="hidden" name="taxReturnBase" id="taxReturnBase" value="<?=$taxReturnBase?>">
	    <input type="hidden" name="lng" id="lng" value="<?=$lng?>">
	    <input type="hidden" name="payerFullName" id="payerFullName" value="<?=$payerFullName?>">	    
	    <input type="hidden" name="test" id="test" value="0">
	    <input type="hidden" name="extra1" id="extra1" value="<?=$extra1?>">
	    <input type="hidden" name="extra3" id="extra3" value="<?=$extra3?>">
	    <input type="hidden" name="responseUrl" id="responseUrl" value="<?=$responseUrl?>">
	    
	    <!--<input type="hidden" name="confirmationUrl" id="confirmationUrl" value="">-->
	    <input type="hidden" name="signature" value="<?=$signature?>">
	</form>
	<script type="text/javascript">
		function enviar_form(){
			document.getElementById("form").submit();
		}
	</script>
</body>
</html>