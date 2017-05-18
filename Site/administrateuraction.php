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
	)  //Verification de la saisie de tous les champs
{
	$id= $_POST['id'];
	$mdp = $_POST['password'];
	
	//Verification que l'administrateur se trouve bien dans la table administrateur
	$query = "
	SELECT login, mdp
	FROM administrateurs 
	WHERE login='$id' AND mdp='$mdp';"; 

	$result = pg_query($connect,$query);

	if(pg_num_rows($result)==0){
		echo "<br>Mauvais login et/ou mot de passe";
	}
	else {
		//Affichage des candidats non validés
		$query2 = "
		SELECT v. id, v.nom, v.prenom, c.programme, c.parti 
		FROM Candidats c, Votants v
		WHERE v.id = c.id AND c.validation='FALSE';";

		$result2 = pg_query($connect,$query2);

		echo "
		Choisir un candidat à valider :<BR>
		<BR>
		<table>
		<form method='post' action='validercandidat.php'>";

		while($row = pg_fetch_array($result2,NULL,PGSQL_NUM))
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
					</TD>
				</TR>";
		}

		
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

pg_close($connect);
?>
<BR>
<a href="accueil.html">Retour à l'accueil</a>
</center>
</body>
</html>
