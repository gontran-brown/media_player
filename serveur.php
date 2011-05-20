<?php

	if(isset($_POST['mon_tableau_de_donnee'])){
		$tab = $_POST['mon_tableau_de_donnee'];
		echo 'mon tableau est bien rempli il me <br/> suffit de recuperer tout les valeurs<br/>';
	}
	else{
		echo 'je n\'arrive pas a atteindre les donnees du tableau <br/>';
	}
	
	if(isset($_POST['debut'])  ){
		$deb = $_POST['debut'] ;
	}
	else{
		echo 'pas de donnee dans la partie debut<br/>';
	}
	if(isset($_POST['fin'])){
		$end = $_POST['fin'];
	}
	else{
		echo 'pas de donnee dans la partie fin<br/>';
	}
	if(isset($_POST['subtitle'])){
		$sub = $_POST['subtitle'];
	}
	echo 'debut :' .$deb.'<br/>fin : '.$end.'<br/>soustitre :'.$sub;

?>
