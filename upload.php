<?php


$url ='playlist.xml';
$document = simplexml_load_file($url); 
$valeur = '../videos/';
 
	if ($_POST['title'] !=''){
		echo " <br/>on a un  title <br/>";
		$var = $_POST['title'];
		echo $var." <br/>";
		
		$document = simplexml_load_file($url); 
		foreach ($document->trackList as $trackList) 
			foreach ($trackList->track as $track)
				
				if($track->title == $var){
					echo " {$track->title}  : {$track->location}<br>";
					if(ereg('../videos',$track->location) == true){
						$nom_fichier = str_replace('../videos/','',$track->location);
						echo $nom_fichier."<br />";
					}
					else {
						$nom_fichier = str_replace('videos/','',$track->location);
						echo $nom_fichier."<br />";
					}
					
					$info = pathinfo($nom_fichier);
					$file_name =  basename($nom_fichier,'.'.$info['extension']);
					echo $file_name;
				}
		}


/*
echo strstr($adresse,$arobase) 
if (!empty($_POST['title'])){
    $currentVideo = $_POST['title'];
    echo "Notre video : ".$currentVideo."<br />";

    $document_xml = new DomDocument;
    $document_xml->load("playlist.xml") or die ("Fichier introuvable");
    $listelement = $document_xml->getElementsByTagName("track");
    foreach ($listelement as $element){
        // plus d'infos ici si tu ne comprends pas : http://eusebius.developpez.com/php5dom/
        // autre doc vachement sympas : http://tecfa.unige.ch/guides/tie/pdf/files/php-dom.pdf
        $title = $element->getElementsByTagName("title");
        foreach($title as $tt){
            echo $tt->firstChild->nodeValue;
        }
    }  
}
*/

?>
