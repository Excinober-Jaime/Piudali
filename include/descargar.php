<?php
$url=$_GET["url"];
//$path_a_tu_doc="../images/piezas-viral";
//$enlace = $path_a_tu_doc."/".$id;
$enlace=$url;
header ("Content-Disposition: attachment; filename=".$enlace);
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
?>