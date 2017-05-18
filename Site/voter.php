<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<center>
<?php
$connect = pg_connect("host=tuxa.sme.utc port=5432 dbname=bdd user=xx password=xx") or die ('Error connecting to postgresql');

if (	!empty($_POST['id']) && 
	!empty($_POST['password'])  
	)  // vérification de la saisie de tous les champs
{
	$id= $_POST['id'];
	$mdp = $_POST['password'];
	// Verification de l'inscription et la reussite de l'authentification
	
	$query = "
	SELECT id, mdp
	FROM votants 
	WHERE id=$id AND mdp='$mdp';";

	$result = pg_query($connect,$query);

	if(pg_num_rows($result)==0){
		echo "<br>Pas encore inscrit, mauvais ID ou Mot de passe";
	}
	else {
		// Verification de l'absence vote pour cet electeur
		$query2 = "
		SELECT id
		FROM vote
		WHERE id=$id;";

		$result2 = pg_query($connect,$query2);

		if(pg_num_rows($result2)!=0){
			echo "<br>Vote d&eacute;j&agrave; effectu&eacute";
		}
		else{
		//Affichage des candidats valides
		$query3 = "
		SELECT v. id, v.nom, v.prenom, c.programme, c.parti 
		FROM Candidats c, Votants v
		WHERE v.id = c.id AND c.validation='TRUE';";

		$result3 = pg_query($connect,$query3);
		
		echo "
		<table>
		<form method='post' action='ajoutervote.php'>
		<input type='hidden' type='number' name='id' value='$id'>
		<TR>
			<TD> 
				Candidats 
			</TD>
		</TR>";

		while($row = pg_fetch_array($result3,NULL,PGSQL_NUM))
		{
			echo "
				<TR>
					<TD> 
						<input type='radio' name='candidat' value='".$row[0]."'> 
					</TD>

					<TD>
						<b>Candidat : </b>".$row[1]." ".$row[2]."<BR>
						<b>Parti : </b>".$row[4]."<BR>
						<b>Programme : </b>".$row[3]."<BR>
						<BR>
					</TD>
				</TR>";
		}
		
		echo "
			<TR>
				<TD> 
					<input type='radio' name='candidat' value='NULL'> 
				</TD>
			
				<TD>
					<b>Vote Blanc</b><BR>
				</TD>
			</TR>";

		
		echo "
		<TR>
			<TD> 
				<input type='submit' value='Valider'> 
			</TD>
		
			<TD> 
				<input type='reset' VALUE='Effacer'> 
			</TD>
		</TR>
		</table>
		</form>";
		}
	}
}

pg_close($connect);
?>
<BR>
<a href="accueil.html">Retour à l'accueil</a>
</center>
</body>
</html>

