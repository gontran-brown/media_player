<?php

if (isset($_POST)){
	if(isset($_POST['filename'])){
	 
		$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
		$xml .= "<video>\r\n";
	
		$line = "";
		$array = array();
		
		foreach($_POST as $keys){
			 $array[] = $keys;
/*
			foreach($keys as $val){
				$arrray[$keys][]= $keys=>$val;
			}
*/
		}
			  		  
		foreach($array as $keys){  
			$xml.="\t<sous_titres>\r\n";
			if ($array[$keys] == 'debut'){
			$line .= "\t\t<debut>".$array[$keys]."</debut>\r\n";
			}
			if($array[$keys]== 'fin'){
				$line .= "\t\t<fin>".$array[$keys]."</fin>\r\n";
			}
			if($keys == 'subtitle'){
				$line .= "\t\t<subtitle>".$arr[$keys]."</subtitle>\r\n";
				
			}
			$xml .= $line;
			$xml.="\t</sous_titres>\n";
			
      }   
/*
			  
		foreach($_POST as $key=>$val){
			$size = $_POST->elementCount;
			echo $size;
			$keys = ereg_replace("[0-9_]","",$key);
	
*/
			//$array = array($key=>$val);
			
/*
			for($i = 0; $i <$size ; $i++){
			foreach($keys as $val){
*/
/*
				$array[$keys] = array($keys=>$val);
*/
/*
				echo  $array[$keys];
			}
*/
	/*
						$array[] = ;
	*/

	/*

						$array[$i+1]=$keys[$i+1]=>$val;
						$array[$i+2]=$keys[$i+2]=>$val;
	*/
					
			//}
			


	/*		for($i = 0; $i<($size/3); $i++){
				$xml.="\t<sous_titres>\r\n";
				$line .= "\t\t<debut>".$array[$i]."</debut>\r\n";
				$line .= "\t\t<fin>".$array[$i*2]."</fin>\r\n";
				$line .= "\t\t<subtitle>".$array[$i*3]."</subtitle>\r\n";
				$xml .= $line;
				$xml.="\t</sous_titres>\n";
				//$line = "";
			}
	*/
		/*	$line = "";

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
	*/
					//}
				 
		$xml .= "</video>";
		//echo $xml;
		file_put_contents("/var/www/html/data/".$_POST['filename'].".xml", $xml);
	  }

	}
	echo"je suis ici";
?>
