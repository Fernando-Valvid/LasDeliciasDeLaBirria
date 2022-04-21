

<?php
	$cp= $_POST['cp'];
	$colonia= $_POST['colonia'];
	$calle= $_POST['calle'];
	$numero= $_POST['numero'];
	$mensaje= $_POST['mensaje'];
	$t= $_POST['t'];

	$direccion="Direccion: ".$cp.", ".$colonia.", ".$calle.", ".$numero;
	$final=$mensaje." -- ".$t." -- ".$direccion;

	$url= "https://api.whatsapp.com/send?phone=525561425090&text=$final";
	$url=str_replace(PHP_EOL, '', $url);
	header("Location: $url");
	exit;
?>

