<?php
 
if ($_POST['title'] !=''){
	echo " <br/>on a un  title <br/>";
	$var = $_POST['title'];
echo $var." <br/>";
	$fp = fopen("playlist.xml", "r"); //lecure du fichier

	while(!feof($fp)){ //parcourt toutes les lignes
		$page =fgets($fp , 4096); //lecture du contenu de la ligne
	// echo $page;
/*
	$location = eregi("<location>(.*)</location>",,$page ,$reg);
*/
/*
	$titre = eregi("<title>(.*)</title>" ,$page ,$regs);
*/
	$location = eregi("<location>(.*)</location>",,$page ,$reg);
	echo "<br />";
	//echo $regs[1];
/*
	$reg[1] = preg_replace('videos/', '', $reg[1]);
*/

	echo $reg[1];
	if($regs[1] == $var){
		echo "<br /> on se retrouve dans le if(regs == _POST['title'])<br />";
		
		}
	}

fclose($fp);
}
/*
	echo "<br /> nous nous trouvons pas ce cas de figure <br />";
	
	
}	}
*/

 echo " <br/>pas de title <br />";


/*

foreach($_POST as $key=>$val){
	  if ($key == 'title'){	
		  	echo "<br /> on se retrouve dans le cas de figure ou on a le titre dans le xml <br />";*/
?>
