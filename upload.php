<?php
echo 'debut';
echo  '<br/>';

 
 if(!empty($_FILES['document']['name'])){
	echo $_FILES['document']['name'];
	echo  '<br/>';
 }
 else{
	 echo 'vous devez entrer un document pour que ce soit uploader';
 }
 
 if (!($f=fopen("playlist.xml","a+"))) {
	 $file = "playlist.xml";
	$fp = fopen($file, "r");
	$return = fread($fp, filesize($file));
	fclose($fp);
	echo $return;
/*
exit("imposible d'ouvrir le fichier playlist.xml"); 
*/
}
 
else{ 
	$f=fopen("playlist.xml","a+");
	fclose($f); 
	echo'fermeture du fichier playlist.xml'; 
}
 
/*
if (isset($_POST['filename'])){

		if(!empty($_POST['filename'])){
			echo 'un filename <br />';
			echo 'filename =>'.$_POST['filenamee'].'<br/>';
		}else{
			 echo 'filename est vide <br />';
		 }*/
/*
 }
 else 
 *
 echo 'il n\'existe pas de filename';
*/
/*
foreach ($_POST as $key=>$val){

	if (isset($_POST['filename'])){
		if(!empty($_POST['filename'])){
		echo 'existe un filename <br />';
	}else{
		 echo 'filename est vide <br />';
	 }
	}
	

    echo $key.'=>'.$val ;
    echo ' <br /><br />';
    echo 'pour tout les documents, je veux leur valeur  <br/>';
    if ($val === 'document'){
        echo 'key == document  <br/>';
    }
    else
        echo 'je ne suis pas dans la boucle ou il existe un document  <br/>';
}*/
?>

