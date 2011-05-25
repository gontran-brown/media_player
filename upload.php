<?php
/*
if (isset($_FILES['document'])){
	$dossier = '../videos/';
	$fichier = basename($_FILES['document']['name']);

	if(move_uploaded_file($dossier . $fichier,())){
		echo'Upload effectué avec succès !';
	}
	else{
		echo 'Echec de l\'Upload';
	}
}
*/

if (isset($_POST)){
  if (isset($_POST['document'])){
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
		exit($data);
      }
    }  
/*
  //$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
        //$xml .= "<video>\r\n";
	
        $line = "";
        foreach($_POST as $key=>$val){
	  if ($key != 'document'){
	    if (preg_match("#subtitle\d+#", $key)){
	      if (!empty($val)){
		$line .= "\t<".$key.">".$val."</".$key.">\r\n";
		$xml .= $line;
	      }
	      $line = "";
	    }
	    else{
	      $line .= "\t<"location">".$val."</"location/">\r\n";
	    }
	  }
        }
        $xml .= "</video>";
        downloader($xml, $_POST['filename'].".xml", "application/xml");
  }
*/

/*
<track>
         <location> </location>
         <creator> </creator>
         <title> </title>
         <annotation> </annotation>
         <image> </image>
      </track>      
   
*/
 
  }
}

?>
