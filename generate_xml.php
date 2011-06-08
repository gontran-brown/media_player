<?php
if (isset($_POST)){
	if(isset($_POST['filename'])){
	 
		$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
		$xml .= "<video>\r\n";
	
		$line = "";
		$array = $_POST;
	  		  
		foreach($array as $key=>$val){  
			$keys = ereg_replace("[0-9_]","",$key);
			
			if ($keys == 'debut'){
				$xml.="\t<sous_titres>\r\n";
				$line .= "\t\t<debut>".$val."</debut>\r\n";
			}
			else{
				if($keys == 'fin'){
						$line .= "\t\t<fin>".$val."</fin>\r\n";
				}
				else{
					if($keys == 'subtitle'){
						$line .= "\t\t<subtitle>".$val."</subtitle>\r\n";
						$xml .= $line;
						$xml.="\t</sous_titres>\n";
					}
					$line = "";
				}
			}
		}
				 
		$xml .= "</video>";
		
		file_put_contents("/var/www/html/data/".$_POST['filename'].".xml", $xml);
	  }

	}
	echo"je suis ici";
?>
