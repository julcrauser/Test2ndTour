<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
<center>

<?php
$connect = pg_connect("host=tuxa.sme.utc port=5432 dbname=bdd user=xx password=xx") or die ('Error connecting to postgresql');

if (!empty($_POST['id'])) {
	
	$id= $_POST['id'];

	if (empty($_POST['parti']))	
		$parti=NULL;
	else 
		$parti=$_POST['parti'];
	
	if (empty($_POST['programme']))
		$programme=NULL;
	else 
		$programme=$_POST['programme'];

	$query = "
	INSERT INTO candidats (id, parti, programme, validation) 
	VALUES ($id, '$parti', '$programme', FALSE);";

	$result = pg_query($connect,$query);

	echo "Candidature enregistr&eacute;e";
}
pg_close($connect);
?>

<BR>
<a href="accueil.html">Retour à l'accueil</a>
</center>
</body>
</html>

