<?php
if (isset($_POST)){
    if (isset($_POST['filename'])){
        $dom = new DOMDocument('1.0', 'UTF-8');
        //$dom->preserveWhiteSpace = false;
        //$dom->formatOuput = true;

        $video = $dom->createElement("video");
        $dom->appendChild($video);
        $saut = $dom->createTextNode("\n\t");
        $video->appendChild($saut);
        $soustitre = $dom->createElement("sous_titres");
        $video->appendChild($soustitre);

        foreach($_POST as $key=>$val){
            $keys = ereg_replace("[0-9]","",$key);
            if ($keys != 'filename'){
                $saut = $dom->createTextNode("\n\t\t");
                $soustitre->appendChild($saut);
                $noeux_details = $dom->createElement($keys);
                $soustitre->appendChild($noeux_details);
                $noeux_valeur = $dom->createTextNode($val);
                $noeux_details->appendChild($noeux_valeur);
                if (preg_match("#subtitle\d+#", $key)){
                    if (empty($val)){
                        $video->removeChild($soustitre);
                    }
                    $saut = $dom->createTextNode("\n\t");
                    $soustitre->appendChild($saut);
                    $saut = $dom->createTextNode("\n\t");
                    $video->appendChild($saut);
                    $soustitre = $dom->createElement("sous_titres");
                    //$video->appendChild($soustitre);
                    $node = $soustitre->getElementsByTagName('debut')->item(0);
                    echo "le node".$node;
                }
            }
        }
        $video->removeChild($soustitre);

        $dom->save($_POST['filename'].'.xml');
    }
}
