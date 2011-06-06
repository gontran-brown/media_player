<?php

	if (isset($_POST['valeur'])){
		$variable = $_POST['valeur'];
		
		$filename = './videos/'.$variable.'.xml';
			if(file_exists($filename)){
				
				$file = $filename;
				$doc = new DOMDocument();
$doc->loadHTMLFile($file);

$xpath = new DOMXpath($doc);

				
			 if(!$doc = domxml_open_file($filename)) {
			  echo "Erreur lors de l'analyse du document\n";
			  exit;
			}
			$items = $doc->getElementsByTagName('video');
			foreach($items as $item) {
				echo $item.textContent;
			}
/*
				$xmlDoc = new DOMDocument();
				

				$x = $xmlDoc->documentElement;
				$xmlDoc->load($filename);*/
/*
				$xml = new simpleXMLElement($filename);
				echo"je vais entrer dans la boucle";
				foreach ($xml->video AS $item){
*/
/*
				  echo "<input type=\"text\" name=\"debut" $item->debut"\" value=\""$item->debut"\"></input>";
				  echo "<input type=\"text\" name=\"fin" $item->fin"\" value=\""$item->fin"\"></input>";
				  echo "<input type=\"text\" name=\"subtitle" $item->subtitle"\" value=\""$item->subtitle"\"></input>";
echo "je me trouve dans le fichier et je le lis";
*/				
/*
echo'<input type="text" name="'.$item.'" value="'.$item->debut.'"></input>';
*/
/*
				echo '<input type="text" name="fin'.$item->fin'" value="'.$item->fin.'"></input>';
				echo'<input type="text" name="subtitle' .$item->subtitle.'" value="'.$item->subtitle.'"></input>';
*/
/*
				echo $fichier;
*/
					
				  }
/*
				  print $item->nodeName . " = " . $item->nodeValue . "<br />";

				  }*/
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
<?php
// to retrieve selected html data, try these DomXPath examples:

$file = $DOCUMENT_ROOT. "test.html";
$doc = new DOMDocument();
$doc->loadHTMLFile($file);

$xpath = new DOMXpath($doc);

// example 1: for everything with an id
//$elements = $xpath->query("//*[@id]");

// example 2: for node data in a selected id
//$elements = $xpath->query("/html/body/div[@id='yourTagIdHere']");

// example 3: same as above with wildcard
$elements = $xpath->query("video");

if (!is_null($elements)) {
  foreach ($elements as $element) {
    echo "<br/>[". $element->nodeName. "]";

    $nodes = $element->childNodes;
    foreach ($nodes as $node) {
      echo $node->nodeValue. "\n";
      echo'<input type="text" name="'.$item.'" value="'.$item->debut.'"></input>';
    }
  }
}
?>
