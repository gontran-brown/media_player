<?php
if (isset($_FILES['document'])){
	$dossier = '../videos/';
	$fichier = basename($_FILES['document']['name']);

	if(move_uploaded_file($dossier . $fichier,/*destination*/)){
		echo'Upload effectué avec succès !';
	}
	else{
		echo 'Echec de l\'Upload';
	}
}
?>
