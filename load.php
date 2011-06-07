<?php

	if (isset($_POST['valeur'])){
		
		$variable = $_POST['valeur'];
		
		$filename = '../data/'.$variable.'.xml';
			
		if(file_exists($filename)){
			$file = $filename;
			
			$doc = new DOMDocument();
		
			$doc->load($filename);


			$xpath = new DOMXpath($doc);

			$elements = $xpath->query("sous_titres");
			
			if (!is_null($elements)) {
				$i=11;
			  foreach ($elements as $element) {
				
				$name =$element->getElementsByTagName("debut")->item(0);
				
				$valeur = $element->getElementsByTagName("debut")->item(0)->nodeValue; 
				$vfin = $element->getElementsByTagName("fin")->item(0)->nodeValue; 
				$vsub =  $element->getElementsByTagName("subtitle")->item(0)->nodeValue; 
				
				$nodes .="<tr><td><input type=\"text\" name=\"debut".$i."\" value=\"";
				$nodes .= $valeur."\"></input></td>";
				$nodes .="<td><input type=\"text\" name=\"fin".$i."\" value=\"";
				$nodes .= $vfin."\"></input></td>";
				$nodes .="<td><input type=\"text\" name=\"subtitle".$i."\"value=\"";
				$nodes .= $vsub."\"></input></td></tr><br/>";
				$i++;
			  }
			  echo $nodes;
			}
			else 
			echo "elements vide\n";
		}
		else{
/*
				print "Le fichier $filename n'existe pas";
*/
		}
	}
	else
	echo "je n'ai pas de valeur d'entre<br />";


?>
