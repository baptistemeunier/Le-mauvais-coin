-- Remplisage de la table region

INSERT INTO regions(id, nom) VALUES 
(1, "Pays de la Loire"),
(2, "Provence-Alpes-Côte d'Azur"),
(3, "Guyanne");

-- Remplisage de la table villes

INSERT INTO villes(id, nom, cp, region_id) VALUES 
(1, "Nantes", 44000 ,1),
(2, "Carquefou", 44470, 1),
(3, "Pornic", 44210, 1),
(4, "Aix-en-Provence", 13100, 2),
(5, "Cayenne", 97300, 3),
(6, "La roche sur Yon", 85000, 1),
(7, "Saint-Julien-de-Concelles", 44450, 1),
(8, "Piriac-sur-Mer", 44420, 1),
(9, "Saint-Nazaire", 44600, 1),
(10, "Chéméré", 44040, 1),
(11, "Paimbœuf", 44116, 1),
(12, "La Turballe", 211, 1);

-- Remplisage de la table categories

INSERT INTO categories(id, nom) VALUES 
(1, "Animaux"),
(2, "Informatique"),
(3, "Ameublement"),
(4, "Immobilier"),
(5, "Jeux & Jouets"),
(6, "Vétements"),
(7, "Véhicules"),
(8, "Services"),
(9, "Décoration"),
(10, "Image & son"),
(11, "Instruments de Musique");

INSERT INTO users(id, email, tel) VALUES
(1, "coq@gmoul.com", NULL),
(2, "bob@bobo.org", 0601010101),
(3, "crevette@pornic.com", 0826262626),
(4, "arthur@lol.gro", NULL),
(5, "landing@cci.fr", 0645464748),
(6, "danone.bala@voi.ne", 0633940594),
(7, "brigitteu@edu.gouv", NULL),
(8, "anon@ce.pr", NULL),
(9, "jack.lang@pouf.pif", NULL),
(10, "jacque.haricot@magique.conte", NULL),
(11, "memepaspeur@etu.univ-nantes.fr", NULL),
(12, "britney@love.actually", NULL),
(13, "jean.rapetou@magouille.fr", NULL),
(14, "bour.geois@riche.dollar", 9999999999);

INSERT INTO annonces(id, titre, description, prix, user_id, date, categorie_id, ville_id) VALUES (1, "coq de compétition", "donne coq de compétition, peu servi, dans son jus", 0, 1, "2016-02-01", 1, 1),
(2, "ordinateur transportable", "ordinateur transportable 23 pouces de marque soni, remis à zéro pour la vente", 1000, 2, "2016-02-01", 2, 2),
(3, "lit à barreaux", "lit bébé à barreaux blanc, vendu sans matelas et sans bébé", 80, 2, "2016-02-01", 3, 2),
(4, "appartment au bord de la mer", "appartement T4 en bord de mer pour sénor avertis, trois chambres, 2 caves, 5 places de parking et piste d'attérissage pour hélicoptère", 450000, 3, "2016-02-05", 4, 3),
(5, "cartes pokémon collector ultra rares", "lot de 5 cartes pokémon rares comprenant un pikachou et deux rondoudons", NULL, 4, "2016-02-04", 5, 4),
(6, "Sous vétements petit navire", "ensemble de culottes blanches de la marque petit navire, produit absolument original, quelques taches sont présentes mais rien de grave", 10, 4, "2016-02-05", 6, 4),
(7, "Fiat 500 aménagée en Camping Car", "Fiat 500, carte grise 12 places aménagée camping car avec lit 3 places, auvent et evier/frigo intégré dans la banquette arrière", 15000, 5, "2016-02-05", 7, 5),
(8, "Cours particulier de Nyotaimori", "propose cours particulier de Nyotaimori, avec ou sens wasabi", 100, 6, "2016-02-05", 8, 6),
(9, "fèves de paque", "lot de fèves dora l'exploratrice usagées, à finir de nettoyer", 5, 1, "2016-02-06", 1, 1),
(10, "sapin de noel", "vend cause no crois plus au pere noel, un sapin en plastique avec son lot de boules et plusieurs guirlandes lumineuses", 20, 7, "2016-02-06", 9, 4),
(11, "cassette vidéo ayant appartenu à François Mitterand", "cassette vidéo vierge certifiée etre passée dans les mains de notre feu président, aucune idée du film...", 3000, 8, "2016-02-06", 10, 7),
(12, "smartefone samsoung", "je souhaite vendre, cause triple emploi, un smartefone samsoung absolument neuf et qui a servi 2 ans. Vendu sans batterie, carte sim et écouteurs stéréau. bloqué opérateur lidl mobile", 150, 4, "2016-02-06", 2, 4),
(13, "vélo à réparer", "je me sépare de mon fidèle desprier, quelques travaux à prévoir: roues, cadre, frein, selle, pneus, pédalier et chaine sont probablement à changer. Affaire à saisir!", 120, 9, "2016-02-04", 7, 8),
(14, "arbre multi-centenaire", "arbre très vieux, je sais pas ce que c'est mais c'est vieux. A venir chercher sur place, prévoir un pelle", NULL, 10, "2016-02-08", NULL, 9),
(15, "exercices corrigés de base de données", "je met à disposition, contre un petit repas chaleureux agrémenté de boissons agréables, l'ensemble des sujets corrigés du cours de base de données en Licence 1 de l'université de Nantes", NULL, 11, "2016-02-08", 8, 10),
(16, "T-shirt britney spears", "Cause déménagement, je cède à contre coeur, snif, mon t-shirt collector Britney Spears, baby one more time special tour. Objet rare sur le marché, faire offre en accord avec sa valeur sentimentale", NULL, 12, "2016-02-08", 6, 11),
(17, "4x4 de luxe", "Suite à un controle fiscal, je vend mon 4x4 de luxe toutes options : accoudoirs chauffants, jantes en bois de chène, aileron sport en titane-carbone, etc.", 45000, 13, "2016-02-08", 7, 12),
(18, "maison bourgeoise", "Madame et moi-meme souhaiterions nous séparer de notre pied à terre nantais. Il s'agit d'une maison bourgeoise avec 12 chambres, 6 salles de bain et 1 canapé blanc en cuir de vachette", 1000000, 14, "2016-02-08", 4, 1),
(19, "kazou numérique", "vends un kazou numérique fender à double frete", 200, 9, "2016-02-09", 11, 8),
(20, "ordinateur de landing", "vend cause double emploi, ordinateur de landing de compétition avec clavier, écran,cables et webcam.Très peu servi, sauf projet Java", 1000, 5, "2016-02-05", 2, 5);