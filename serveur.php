<?php
/*
    if(isset($_POST)) {
        foreach($_POST as $key=>$val) {
            echo $key.'=>'.$val.'<p>';
        }
    }
 */
    if(empty($_POST['formulaire'])){
		$form = $_POST['formulaire'];
		echo 'mon tableau est bien rempli il me <br/> suffit de recuperer tout les valeurs<br/>';

		while(!empty($_POST['formulaire'])){
			echo 'tour 1 <br/>';
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
		}
	}
else{
		echo 'je n\'arrive pas a atteindre les donnees du tableau <br/>';
	}
?>
