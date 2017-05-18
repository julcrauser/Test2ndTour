CREATE VIEW RESULTATS (prenom, nom, pourcentage) AS
SELECT Votants.prenom, Votants.nom, count(*)*100/
	(SELECT count(*) FROM Vote WHERE NOT (Vote.candidat IS NULL))
FROM Vote, Votants
WHERE Votants.id = Vote.candidat
GROUP BY Votants.prenom, Votants.nom;
