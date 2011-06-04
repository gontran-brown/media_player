<?php

	if (isset($_POST['valeur'])){
		$variable = $_POST['valeur'];
		
		$filename = './videos/'.$variable.'.xml';
			if(file_exists($filename)){
				print "Le fichier $filename existe";
			}
			else{
				print "Le fichier $filename n'existe pas";
			}
	}
	else
	echo "je n'ai pas de valeur d'entre<br />";

?>
