<?php

	$qry = "SELECT * FROM Lineas";
	$res = mysql_query($qry);
	$lista = mysql_num_rows($res);
	$i=0;
	while ($datos = mysql_fetch_array($res)){
		if($i%2 == 0) $colorFila = 'bgcolor="#FFE7C8"'; else $colorFila = '';
		$va['lineas'] .= '<tr class="texto2" '.$colorFila.'>
					        <td align="center">'.$datos[1].'</td>
					        <td align="center">'.$datos[5].'</td>
					        <td align="center"><a href="index.php?cmd=lineas&action=editar&id='.$datos[0].'">Editar</a></td>
					      </tr>'; 
	$i++;
	}

	require($cfg['path_templates'] . 'lineas.html');	
?>