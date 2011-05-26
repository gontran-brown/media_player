<?php
echo 'debut';
echo "< br/>";
foreach ($_POST as $key=>$val){
    echo $key.'=>'.$val;
    echo 'pour tout les document je veux leur valeur <br />';
    if ($key == 'document'){
        echo 'key == document< br/>';
    }
    else
        echo 'je ne suis pas dans la boucle ou il existe un document< br/>';
}
?>

