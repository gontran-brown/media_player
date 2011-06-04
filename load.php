<?php

	if (isset($_POST['valeur'])){
		$variable = $_POST['valeur'];
		
		$filename = './videos/'.$variable.'.xml';
			if(file_exists($filename)){
				$xmlDoc = new DOMDocument();
				$xmlDoc->load($filename);

				$x = $xmlDoc->documentElement;
				foreach ($x->childNodes AS $item)
				  {
				  print $item->nodeName . " = " . $item->nodeValue . "<br />";
				  }
/*
				print "Le fichier $filename existe";
*/
			}
			else{
				print "Le fichier $filename n'existe pas";
			}
	}
	else
	echo "je n'ai pas de valeur d'entre<br />";

?>
