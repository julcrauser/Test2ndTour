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
	) // Verification de la saisie de tous les champs
{
	$id= $_POST['id'];
	$mdp = $_POST['password'];
	
	//V erification que l'electeur est bien inscrit
	$query = "
	SELECT id, mdp
	FROM votants 
	WHERE id=$id AND mdp='$mdp';";

	$result = pg_query($connect,$query);


	if(pg_num_rows($result)==0){
		echo "<br>Pas encore inscrit, mauvais ID ou Mot de passe";
	}
	else {
		// Verication que l'electeur n'est pas deja candidat		
		$query2 = "
		SELECT id
		FROM candidats c
		WHERE c.id=$id;";

		$result2 = pg_query($connect,$query2);
		if(pg_num_rows($result2)!=0){
			echo "<br>Candidature d&eacute;j&agrave; donn&eacute;e";
		}
		else {
			echo "
			<table>
			<form method='post' action='ajoutercandidature.php'>
			<input type='hidden' type='number' name='id' value='$id'>
			<TR>
				<TD> 
					Parti 
				</TD>

				<TD> 
					<input type='text' name='parti' required> 
				</TD>
			</TR>

			<TR>
				<TD> 
					Programme 
				</TD>
	
				<TD>
					<TEXTAREA name='programme' rows=4 cols=40 maxlength='500'>Max 500 caract&egrave;res</TEXTAREA>
				</TD>
			</TR>
		
			<TR>
				<TD> 
					<input type='submit' value='Valider'> 
				</TD>
		
				<TD> 
					<input type='reset' VALUE='Effacer'> 
				</TD>
			</TR>
		
			</form>
			</table>";

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
