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
	  header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
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
	  header('Content-Length: '.filesize($data)); 
          
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
	  if ($key != 'filename'){
	    if (preg_match("#subtitle\d+#", $key)){
	      if (!empty($val)){
		$line .= "\t<".$key.">".$val."</".$key.">\r\n";
		$xml .= $line;
	      }
	      $line = "";
	    }
	    else{
	      $line .= "\t<".$key.">".$val."</".$key.">\r\n";
	    }
	  }
        }
        $xml .= "</video>";
        downloader($xml, $_POST['filename'].".xml", "application/xml");
  }
}

if (isset($_POST['title'])){
	echo " <br/>on a un  title";
/*
	foreach($_POST as $key=>$val){
*/
	  if ($key == 'title'){	
		  	echo "<br /> on se retrouve dans le cas de figure ou on a le titre dans le xml";

/*	$fp = fopen("playlist.xml", "r"); //lecure du fichier

	while(!feof($fp)){ //parcourt toutes les lignes
		$page .=fgets($fp , 4096); //lecture du contenu de la ligne
	}
	
	$titre = eregi("<title>(.*)</title>" ,$page ,$regs);
	echo $regs[1];
*/
/*
	if($regs == $POST['title']){
		echo "<br /> on se retrouve dans le cas de figure ou on a le titre dans le xml";
		
	}

fclose($fp);*/
}
	echo "<br /> nous nous trouvons pas ce cas de figure";
	
	
	//}
}
 echo " <br/>pas de title";
?>
