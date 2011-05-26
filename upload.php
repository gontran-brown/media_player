<?php
echo 'debut';
echo  '<br/>';

/*
if (isset($_POST['filename'])){
*/
		if(!empty($_POST['filename'])){
			echo 'un filename <br />';
			echo 'filename =>'.$_POST['filenamee'].'<br/>';
		}else{
			 echo 'filename est vide <br />';
		 }
/*
 }
 else 
 echo 'il n\'existe pas de filename';
*/

foreach ($_POST as $key=>$val){
/*
	if (isset($_POST['filename'])){
		if(!empty($_POST['filename'])){
		echo 'existe un filename <br />';
	}else{
		 echo 'filename est vide <br />';
	 }
	}
	
*/
    echo $key.'=>'.$val ;
    echo ' <br /><br />';
    echo 'pour tout les documents, je veux leur valeur  <br/>';
    if ($val === 'document'){
        echo 'key == document  <br/>';
    }
    else
        echo 'je ne suis pas dans la boucle ou il existe un document  <br/>';
}
?>

