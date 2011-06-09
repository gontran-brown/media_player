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
					}
				}
			}
		}
				 
		$xml .= "</video>";
		file_put_contents($_POST['filename'].".xml", $xml);
	  }
	}
	echo"je suis ici";
?>
