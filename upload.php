<?php

$url ='playlist.xml';
$document = simplexml_load_file($url); 
/*
  foreach ($document->trackList as $trackList) 
    foreach ($trackList->track as $track)
      echo "title : {$track->title}  : {$track->location}<br>";
*/
 
	if ($_POST['title'] !=''){
		echo " <br/>on a un  title <br/>";
		$var = $_POST['title'];
		echo $var." <br/>";
		
		$document = simplexml_load_file($url); 
		foreach ($document->trackList as $trackList) 
			foreach ($trackList->track as $track)
				
				if($track->title == $var){
				  echo " {$track->title}  : {$track->location}<br>";
				}

		}
?>
