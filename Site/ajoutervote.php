<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
<center>

<?php
$connect = pg_connect("host=tuxa.sme.utc port=5432 dbname=bdd user=xx password=xx") or die ('Error connecting to postgresql');

if ((!empty($_POST['id']))) {
	
	$id= $_POST['id'];

	if (empty($_POST['candidat']))
		$candidat=NULL;
	else 
		$candidat=$_POST['candidat'];

	$query = "
	INSERT INTO Vote (id, candidat) 
	VALUES ($id, $candidat);";

	$result = pg_query($connect,$query);

	echo "Vote enregistr&eacute";
}
pg_close($connect);
?>

<BR>
<a href="accueil.html">Retour à l'accueil</a>
</center>
</body>
</html>

