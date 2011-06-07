<?php
if (isset($_POST)){
  if (isset($_POST['filename'])){
    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
    $xml .= "<video>\r\n";
	
    $line = "";
        
	foreach($_POST as $key=>$val){
		$keys = ereg_replace("[0-9_]","",$key);
		if ($keys != 'filename'){
			if (preg_match("#subtitle\d+#", $key)){

				if (!empty($val)){
					$xml.="\t<sous_titres>\r\n";
					$line .= "\t\t<".$keys.">".$val."</".$keys.">\r\n";
					$xml .= $line;
					$xml.="\t</sous_titres>\n";
				}
				$line = "";
			}
			else{
				$line .= "\t\t<".$keys.">".$val."</".$keys.">\r\n";
			}
		}
	}       
	$xml .= "</video>";
	file_put_contents("/var/www/html/data/".$_POST['filename'].".xml", $xml);
  }
}
?>
