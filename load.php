<?php

	if (isset($_POST['valeur'])){
		$variable = $_POST['valeur'];
		
		$filename = './videos/'.$variable.'.xml';
			if(file_exists($filename)){
/*
				$xmlDoc = new DOMDocument();
				

				$x = $xmlDoc->documentElement;
*/				$xmlDoc->load($filename);
				$xml = new simpleXMLElement($filename);
				foreach ($xml->video[0] AS $item)
				  {switch((string) $item[]){
					case 'debut':
					$debut = $item->debut;
					break;
					case 'fin':
					$fin = $item->fin;
					break;
					case 'subtitle':
					$subtitle = $item->subtitle;
					break;
					
				  }
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
