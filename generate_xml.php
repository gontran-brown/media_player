<?php
if (isset($_POST)){
  if (isset($_POST['filename'])){
    if(!function_exists('downloader')){
      function downloader($data, $filename = true, $content = 'application/x-octet-stream')
      {
	// If headers have already been sent, there is no point for this function.
	if(headers_sent()) return false;
	// If $filename is set to true (or left as default), treat $data as a filepath.
	if($filename === true){
	  if(!file_exists($data)) return false;
	  $data = file_get_contents($data);
	}
	if(strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== false){
	  header('Content-Disposition: attachment; filename="'.$filename.'"');  
	  header('Expires: 0');
	  header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	  header('Content-Transfer-Encoding: binary');
	  header('Content-Type: '.$content);
	  header('Pragma: public');
	  header('Content-Length: '.strlen($data));
	}
	else{
	  header('Content-Disposition: attachment; filename="'.$filename.'"');
	  header('Content-Transfer-Encoding: binary');
	  header('Content-Type: '.$content);
	  header('Expires: 0');
	  header('Pragma: no-cache');
	  header('Content-Length: '.strlen($data)); 
          
	}
	// Send file to browser, and terminate script to prevent corruption of data.
	exit($data);
      }
    }
    
    // Create the rest of your XML Data...
    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
    $xml .= "<video>\r\n";
	
        $line = "";
        
        foreach($_POST as $key=>$val){
		$keys = ereg_replace("[0-9]","",$key);
		if ($keys != 'filename'){
			if (preg_match("#subtitle\d+#", $key)){
				
			 $xml.="\t<sous_titres>\r\n";
			  if (!empty($val)){				
				$line .= "\t\t<".$keys.">".$val."</".$keys.">\r\n";
				$xml .= $line;$xml.="\t</sous_titres>\n";
			  }
			  $line = "";
			   //$xml.="\t</sous_titres>\n";
			}
			else{
				 
			  $line .= "\t\t<".$keys.">".$val."</".$keys.">\r\n";
			 
			}
		}
    }       
        $xml .= "</video>";
        downloader($xml, $_POST['filename'].".xml", "application/xml");
  }
}
