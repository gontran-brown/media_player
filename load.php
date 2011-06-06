<?php

	if (isset($_POST['valeur'])){
		
		$variable = $_POST['valeur'];
		
		$filename = '../data/'.$variable.'.xml';
			
		if(file_exists($filename)){
			$file = $filename;
			
			$doc = new DOMDocument();
		
			$doc->load($filename);
			echo $doc->saveXml();
			//$dom = $doc->documentElement->getElementsByTagName("video";
var_dump ($doc);
/*
var_dump ($dom);
*/

			$xpath = new DOMXpath($doc);
			//echo "je suis ici \n";
			var_dump ($xpath );
			$elements = $xpath->query("sous_titres");
			
			//echo "le premier noeud".$elemennts->childNodes."\n";
			//echo "apres laffectation des elements avec xpath\n";
			if (!is_null($elements)) {
				
				echo "je ne suis pas nul\n";
				echo $elements->length ."\n";
			  foreach ($elements as $element) {
				  echo "entre dans la boucle foreach";
				echo "<br/>[". $element->nodeName. "]";
				echo $element->getElementsByTagName("debut")->item(0)->nodeValue; 
				/*
				$nodes = $element->childNodes;
				foreach ($nodes as $node){
				  echo $node->nodeValue. "\n";
				  echo"<input type=\"text\" name=\"".$node."\" value=\"".$node->nodeValue."\"></input>";
				}
				* */
			  }
			}
			else 
			echo "elements vide\n";
		}
		else{
				print "Le fichier $filename n'existe pas";
		}
	/**/}
	else
	echo "je n'ai pas de valeur d'entre<br />";


?>
