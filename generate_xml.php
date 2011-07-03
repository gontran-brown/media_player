<?php
if (isset($_POST)){
	//echo "jentre dans la boucle j'existe";
	if(isset($_POST['filename'])){
	 
		$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
		$xml .= "<video>\r\n";
		$arr = array();
		$line = "";
		$array = $_POST;
		foreach($array as $key=>$val){  
			//echo "dans la boucle foreach <br/>";
			$keys = ereg_replace("[0-9_]","",$key);
			
			if ($keys == 'debut'){
				$line.="\t<sous_titres>\r\n";
				$line .= "\t\t<debut>".$val."</debut>\r\n";
			}
			else{
				if($keys == 'fin'){
						$line .= "\t\t<fin>".$val."</fin>\r\n";
				}
				else{
					if($keys == 'subtitle'){
						$line .= "\t\t<subtitle>".$val."</subtitle>\r\n";
						$line .= "\t</sous_titres>\n";
						if (empty($val)){
							$line = "";
						}				
						$xml.= $line;
						$arr = $line;	
						//echo $arr;							
					}
				}
			}
			
		}
		foreach($arr as $k=>$v){  
			foreach($k as $v=>$va){
			echo $v. ":".$va."<br/>";
			}
		}
		$xml.= "</video>";
/*
		$arr = array($xml);
*/
		print_r ($arr);
		
		file_put_contents("/var/www/html/data/".$_POST['filename'].".xml", $xml);
		
		}

	}
	echo"je suis ici";
?>
	
