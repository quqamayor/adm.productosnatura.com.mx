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

	$query = mysql_query("SELECT * FROM Sublineas");
	//print"$query";
	$total_registros = mysql_num_rows($query);

	
	$qry = "SELECT * FROM Sublineas LIMIT $inicio, $registros";
	$res = mysql_query($qry);
	$filas = mysql_num_rows($res);
	$total_paginas = ceil($total_registros / $registros);
	$i=0;
	while ($datos = mysql_fetch_array($res)){
		if($i%2 == 0) $colorFila = 'bgcolor="#FFE7C8"'; else $colorFila = '';
		$qryl = "SELECT Nombre FROM Lineas WHERE ID_lineas=$datos[1]";
	//	print $qryl;
		$resl = mysql_query($qryl);
		$datosl = mysql_fetch_array($resl);
			
			$va['sublineas'] .= '<tr class="texto2" '.$colorFila.'>
								<td align="center">'.$datos[2].'</td>
								<td align="center">'.$datosl[0].'</td>
								<td align="center">'.$datos[6].'</td>
								<td align="center"><a href="index.php?cmd=sublineas&action=editar&id='.$datos[0].'">Editar</a></td>
							  </tr>'; 
	$i++;
	}
	//echo 'Bienvenido a: ' . $va['chosen'];
	//exit;
	require($cfg['path_templates'] . 'sublineas.html');

?>