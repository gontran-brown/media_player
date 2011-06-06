<?php
if (isset($_POST)){
    if (isset($_POST['filename'])){
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOuput = true;

        $video = $dom->createElement("video");
        $dom->appendChild($video);
        $soustitre = $dom->createElement("sous_titres");
        $video->appendChild($soustitre);

        foreach($_POST as $key=>$val){
            $keys = ereg_replace("[0-9]","",$key);
            if ($keys != 'filename'){
                $noeux_details = $dom->createElement($keys);
                $soustitre->appendChild($noeux_details);
                $noeux_valeur = $dom->createTextNode($val);
                $noeux_details->appendChild($noeux_valeur);
                if (preg_match("#subtitle\d+#", $key)){
                    if (empty($val)){
                        $video->removeChild($soustitre);
                    }
                    $soustitre = $dom->createElement("sous_titres");
                    $video->appendChild($soustitre);
                }
            }
        }
        $video->removeChild($soustitre);

        $dom->save($_POST['filename'].'.xml');

    }
}
