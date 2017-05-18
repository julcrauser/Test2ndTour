<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
<center>

<?php
$connect = pg_connect("host=tuxa.sme.utc port=5432 dbname=bdd user=xx password=xx") or die ('Error connecting to postgresql');

if (!empty($_POST['candidat'])) {
	
	$candidat= $_POST['candidat'];

	$query = "
	UPDATE candidats
	SET validation = 'TRUE'
	WHERE id = $candidat;";

	$result = pg_query($connect,$query);
	echo "Candidature valid&eacute;e";
}
pg_close($connect);
?>

<BR>
<a href="accueil.html">Retour à l'accueil</a>
</center>

</body>
</html>

