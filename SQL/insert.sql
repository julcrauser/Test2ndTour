INSERT INTO Votants (id, nom, prenom, datedn, villedn, depdn, sexe, adresse, ville, codepostal, mdp) VALUES
(160000000120, 'Dupont', 'Martine', '01-01-1990', 'Paris', 75, 'F', '14 rue Solferino','Compiegne','60200','mdupont');

INSERT INTO Prenoms(id, prenom) VALUES
(160000000120, 'Lucile');

INSERT INTO Votants (id, nom, prenom ,datedn, villedn, depdn, sexe, adresse, ville, codepostal, mdp) VALUES
(160000000121, 'Lepen', 'Marine', '05-08-1968', 'Neuilly-sur-Seine', 92, 'F', '14 rue Paris','Paris','92051','mlepen');

INSERT INTO Prenoms(id, prenom) VALUES
(160000000121, 'Marion');

INSERT INTO Prenoms(id, prenom) VALUES
(160000000121, 'Anne');

INSERT INTO Prenoms(id, prenom) VALUES
(160000000121, 'Perine');

INSERT INTO Votants (id, nom, prenom, datedn, villedn, depdn, sexe, adresse, ville, codepostal, mdp) VALUES
(160000000122, 'Macron', 'Emmanuel', '21-12-1977', 'Amiens', 80, 'H', '16 rue Paris','Paris','92340','emacron');

INSERT INTO Prenoms(id, prenom) VALUES
(160000000122, 'Jean-Michel');

INSERT INTO Prenoms(id, prenom) VALUES
(160000000122, 'Frederic');

INSERT INTO Candidats (id, programme, parti, validation) VALUES
(160000000122, 'Programme Macron', 'En marche', TRUE);

INSERT INTO Candidats (id, programme, parti, validation) VALUES
(160000000121, 'Programme Lepen', 'Front national', FALSE);

INSERT INTO Vote (id, candidat)VALUES
(160000000122, 160000000122);

INSERT INTO Administrateurs (login, mdp) VALUES
('admin', 'admin');
