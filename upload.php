<?php
/*
echo 'debut';
echo  '<br/>';

 
 if(!empty($_FILES['document']['name'])){
	 $doc =  $_FILES['document']['name'];
	echo $doc;
	$xml .= "<track>\r\n";
	$info ="facultatif";
	$line .= "\t<location>".$doc."</location>\r\n";
	$line .= "\t<creator>".$info."</creator\r\n";	
	$line .= "\t<title>".$info."</title\r\n";	
	$line .= "\t<limage>".$info."</image>\r\n";	
	 
         
	$xml .= $line;
	$xml .= "</track>";
	echo  '<br/>';
	if (!($f=fopen("playlist.xml","a+"))) {
		$file = "playlist.xml";
		$fp = fopen($file, "r");
		$return =$xml.fread($fp, filesize($file));
		fclose($fp);
		echo $return;
	}
 }
 else{
	 echo 'vous devez entrer un document pour que ce soit uploader';
 }
*/
 
/*
if($_REQUEST['confirm']=="oui") 
*/
 
if ($_POST['title'] !=''){
	echo " <br/>on a un  title";
	
	foreach($_POST as $key=>$val){
	  if ($key == 'title'){	
		  	echo "<br /> on se retrouve dans le cas de figure ou on a le titre dans le xml";

	$fp = fopen("playlist.xml", "r"); //lecure du fichier

	while(!feof($fp)){ //parcourt toutes les lignes
		$page .=fgets($fp , 4096); //lecture du contenu de la ligne
	}
	
	$titre = eregi("<title>(.*)</title>" ,$page ,$regs);
	echo $regs[1];
	if($regs == $_POST['title']){
		echo "<br /> on se retrouve dans le cas de figure ou on a le titre dans le xml";
		
	}

fclose($fp);
}
	echo "<br /> nous nous trouvons pas ce cas de figure";
	
	
	}
}
 echo " <br/>pas de title";

/*
exit("imposible d'ouvrir le fichier playlist.xml"); 
*/

/*
 }
else{ 
	$f=fopen("playlist.xml","a+");
	fclose($f); 
	echo'fermeture du fichier playlist.xml'; 
}
*/
 
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

