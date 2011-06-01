<?php

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
    /*
        if ($element->firstChild->nodeValue == $currentVideo){
            echo "bjbjbj";
            foreach ($element as $child){
                echo $child->nodeValue;
            }
        }
        echo $element->firstChild->nodeValue."<br />";
    }

    // lecture du fichier xml
    $fp = fopen("playlist.xml", "r") or die ("Fichier introuvable");

    while ($fdata = fread($fp, 2048)){
        xml_parse($xml_parseur, $fdata, feof($fp)) or die(
            sprintf("Erreur XML : %s à la ligne %d\n",
            xml_error_string(xml_get_error_code($xml_parseur)),
            xml_get_current_line_number($xml_parseur))
        );
    }
    // parcours des lignes du fichier (flux de données):
    while(!feof($fp)){
        $page =fgets($fp , 4096);
        $location = eregi("<location>(.*)</location>", $page, $reg);

while (list(, $value) = each($reg)) {
    echo "Valeur : $value<br />\n";
}
        if($reg == $currentVideo){
            echo "<br /> on se retrouve dans le if(regs == _POST['title'])<br />";

        }
    }
    // fermeture du fichier
    fclose($fp);
     */
}
?>
