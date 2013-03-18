<?php


	for ($i=1; $i<=10;$i++){
		
		for ($j=1; $j<=10;$j++){
		
			$va['home'] .= "$i x $j = ".($i*$j)."<br>";	
		}
		$va['home'] .= "<br>";
		
	}


	require($cfg['path_templates'] . 'home.html');
	echo '<a href="linea/ekos">Visita la linea ekos</a>';
	exit;

?>