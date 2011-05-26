<?php
	echo 'debut';
		if (isset($_POST)){
			echo 'boucle exist un $_POST';
			foreach ($_POST as $key=>$val){
				echo 'pour tout les document je veux leur valeur';
			if ($key == 'document'){
				echo 'key == document';
			}

			echo 'il exite un docutment';
			if(!function_exists('downloader')){
				echo 'dans la boucle !function_exists(\'downloader\')';
				function downloader($data, $filename = true, $content = 'application/x-octet-stream'){
					if(headers_sent()) return false;

					if($filename === true){
						if(!file_exists($data)) return false;
						$data = file_get_contents($data);
					}
					exit($data);
				}
			}
		}  
		}
		else 
		echo 'je ne suis pas dans la boucle ou il existe un document';
/*
	}
*/


?>

