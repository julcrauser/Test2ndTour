<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<center>
<?php
$connect = pg_connect("host=tuxa.sme.utc port=5432 dbname=bdd user=xx password=xx") or die ('Error connecting to postgresql');

if (
	!empty($_POST['id']) && 
	!empty($_POST['password']) &&
	!empty($_POST['nom']) && 
	!empty($_POST['prenom']) && 
	!empty($_POST['datedn']) && 
	!empty($_POST['villedn']) && 
	!empty($_POST['depdn']) &&
	!empty($_POST['sexe']) &&
	!empty($_POST['adresse']) &&
	!empty($_POST['ville']) &&
	!empty($_POST['codepostal'])
	 )  // Verification de la saisie de tous les champs
{
	$id= $_POST['id'];
	$mdp = $_POST['password'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$datedn = $_POST['datedn'];
	$villedn = $_POST['villedn']; 
	$depdn = $_POST['depdn'];
	$sexe = $_POST['sexe'];
	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];
	$codepostal = $_POST['codepostal'];
	
	// Verification que l'electeur n'est pas deja inscrit
	$query = "
	SELECT id 
	FROM Votants 
	WHERE id=$id;";

	$result = pg_query($connect,$query);

	if(pg_num_rows($result)!=0){
		echo "<br>Inscription d&eacute;j&agrave; faite";
	}
	else {
		// Inscription du l'electeur
		$query2 = "
		INSERT INTO Votants (id, nom, prenom, datedn, villedn, depdn, sexe, adresse, ville, codepostal, mdp) VALUES
		('$id', '$nom','$prenom', '$datedn', '$villedn', '$depdn', '$sexe', '$adresse', '$ville', '$codepostal', '$mdp');";
		
		$result2 = pg_query($connect,$query2);

		// Ajouts des autres prenoms
		if(!empty($p2=$_POST['p2'])) 
			$result3 = pg_query($connect,"INSERT INTO Prenoms (id, prenom) VALUES ('$id','$p2');");
		if(!empty($p3=$_POST['p3'])) 
			$result4 = pg_query($connect,"INSERT INTO Prenoms (id, prenom) VALUES ('$id','$p3');");
		if(!empty($p4=$_POST['p4'])) 
			$result5 = pg_query($connect,"INSERT INTO Prenoms (id, prenom) VALUES ('$id','$p4');");	

		if(!$result2){
			echo "<br>Il y a eu une erreur de saisie, veuillez recommencer";
		}
		else{
			echo "<br> L'inscription a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s <br>";
		}
	}
}
else{                                             //sinon, si tous les champs ne sont pas saisis
	echo "Formulaire mal rempli";
}
pg_close($connect);
?>
<BR>
<a href="accueil.html">Retour à l'accueil</a>
</center>
</body>
</html>

