<?php

$pagina = $_GET["pagina"];
$registros = 15;

if (!$pagina) { 
    $inicio = 0; 
    $pagina = 1; 
	//echo 1;
} 
else { 
    $inicio = ($pagina - 1) * $registros; 
	//echo 2;
} 

	$qry = mysql_query("SELECT * FROM Catalogo ORDER BY ID_ciclos DESC");
	$total_registros = mysql_num_rows($qry);
	
	$qry = "SELECT * FROM Catalogo ORDER BY ID_ciclos DESC LIMIT $inicio, $registros";
	$res = mysql_query($qry);
	$lista = mysql_num_rows($res);
	$total_paginas = ceil($total_registros / $registros);



require($cfg['path_templates'] . 'catalogo.html');

?>