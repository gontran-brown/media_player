<?php
	echo 'debut<';
	echo " br/>";
	foreach ($_POST as $key=>$val){
				echo 'pour tout les document je veux leur valeur <br />';
			if ($key == 'document'){
				echo 'key == document< br/>';
			}
		}
		if (isset($_POST)){
			echo 'boucle exist un $_POST< br/>';
/*
			foreach ($_POST as $key=>$val){
				echo 'pour tout les document je veux leur valeur';
			if ($key == 'document'){
				echo 'key == document';
			}
<<<<<<< HEAD
*/

/*
=======
>>>>>>> b6421024eeac645cca912e536bce33b9132aa2c3
			echo 'il exite un docutment';
			if(!function_exists('downloader')){
				echo 'dans la boucle !function_exists(\'downloader\')< br/>';
				function downloader($data, $filename = true, $content = 'application/x-octet-stream'){
					if(headers_sent()) return false;

					if($filename === true){
						if(!file_exists($data)) return false;
						$data = file_get_contents($data);
					}
					exit($data);
				}
			}
*/
/*
		}  
*/
		}
		else 
<<<<<<< HEAD
		echo 'je ne suis pas dans la boucle ou il existe un document< br/>';
/*
	}
*/

=======
		echo 'je ne suis pas dans la boucle ou il existe un document';
>>>>>>> b6421024eeac645cca912e536bce33b9132aa2c3

?>

