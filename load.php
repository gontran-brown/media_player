<?php

	if (isset($_POST['valeur'])){
		$variable = $_POST['valeur'];
		
		$filename = './videos/'.$variable.'.xml';
		if(file_exists($filename)){
			$file = $filename;
			$doc = new DOMDocument();
			$doc->loadHTMLFile($file);

			$xpath = new DOMXpath($doc);
			
			$elements = $xpath->query("sous_titres");

			if (!is_null($elements)) {
			  foreach ($elements as $element) {
				echo "<br/>[". $element->nodeName. "]";

				$nodes = $element->childNodes;
				foreach ($nodes as $node) {
				  echo $node->nodeValue. "\n";
				  echo'<input type="text" name="'.$node.'" value="'.$node->nodeValue.'"></input>';
				}
			  }
			}
		}
		else{
				print "Le fichier $filename n'existe pas";
		}
	}
	else
	echo "je n'ai pas de valeur d'entre<br />";

?>
