<?php
	if(isset($_POST['valeur'])){
		$variable = $_POST['valeur'];
		
		$filename = '../data/'.$variable.'.xml';
			
		if(file_exists($filename)){
			$file = $filename;
			
			$doc = new DOMDocument();
		
			$doc->load($filename);

		

			$xpath = new DOMXpath($doc);

			$elements = $xpath->query("sous_titres");
			
			
			if(!is_null($elements)){
				$i=11;
				foreach ($elements as $element){
	
/*		DataRow row = listRow[indice];
nodeBem.InnerXml = row["ger"];
* 		$name =$element->getElementsByTagName("debut")->item(0);
					if($element->nextSibling->getElementsByTagName("debut") < $name){
						$temporaire = $name;
						$name = $element->nextSibling->getElementsByTagName("debut");
						
				  for ($p = 0; $p <$elements->length; $p++)
				  { 
					   $flag = $elements->length; 
					   for($j = 0; $j <$elements->ength; $j++) 
					   { 
							 // trouver le comparé 
						  $Compare = $tab[$j]; 
							 // trouver le comparant 
						  $flag = $flag - 1; 
						  $NbComparant = $elements->length - $flag; 
						  $Comparant = $tab[$NbComparant]; 
							 // sauvegarder le comparant 
						  $SavComparant = $tab[$NbComparant]; 
						   
							 // COMPARER 
						  if($Compare>$Comparant) 
						  { 
								// inverser le comparant et le comparé 
							 $tab[$NbComparant] = $tab[$p]; 
							 $tab[$p] = $SavComparant; 
						  } 
					   }
					} 
	while($j != $n)
		{
		//echo("Boucle numero $j on étudie la case $j = ".$unsorted[$j]."<br>");
		$i = $j - 1; //Case étudiée par rapport à l'analysée
		$cle = $unsorted[$j];
		while(($i > -1) && ($unsorted[$i] > $cle))
			{
			//echo("     |--- Sous-boucle i = $i <br>");
			$unsorted[$i + 1] = $unsorted[$i];
			$i = $i - 1;
			}
		$unsorted[$i + 1] = $cle;
		$j++;
		}
	return $unsorted;
	}
*/
					
					$name =$element->getElementsByTagName("debut")->item(0);
					$valeur = $element->getElementsByTagName("debut")->item(0)->nodeValue; 
					$vfin = $element->getElementsByTagName("fin")->item(0)->nodeValue; 
					$vsub =  $element->getElementsByTagName("subtitle")->item(0)->nodeValue; 
					$nodes .="<tr><td><input type=\"text\" name=\"debut".$i."\" value=\"";
					$nodes .= $valeur."\"></input></td>";
					$nodes .="<td><input type=\"text\" name=\"fin".$i."\" value=\"";
					$nodes .= $vfin."\"></input></td>";
					$nodes .="<td><input type=\"text\" name=\"subtitle".$i."\"value=\"";
					$nodes .= $vsub."\"></input></td></tr><br/>";
					$i++;
				}
				echo $nodes;
			}
			else 
				echo "elements vide\n";
		}		
	}
	else
		echo "je n'ai pas de valeur d'entre<br />";
?>
