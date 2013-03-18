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

	$qry = mysql_query("SELECT * FROM Ciclos");
	$total_registros = mysql_num_rows($qry);
	
	$qry = "SELECT * FROM Ciclos LIMIT $inicio, $registros";
	$res = mysql_query($qry);
	$lista = mysql_num_rows($res);
	$total_paginas = ceil($total_registros / $registros);
	$i=0;
	while ($datos = mysql_fetch_array($res)){
		if($i%2 == 0) $colorFila = 'bgcolor="#FFE7C8"'; else $colorFila = '';
		$va['ciclos'] .= '<tr class="texto2" '.$colorFila.'>
					        <td align="center">'.$datos[1].'</td>
					        <td align="center">'.$datos[2].'</td>
							<td align="center">'.$datos[3].'</td>
							<td align="center">'.$datos[6].'</td>
					        <td align="center"><a href="index.php?cmd=ciclos&action=editar&id='.$datos[0].'">Editar</a></td>
					      </tr>'; 
	$i++;
	}
	require($cfg['path_templates'] . 'ciclos.html');

?>