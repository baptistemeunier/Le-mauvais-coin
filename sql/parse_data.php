<?php
$data = "1	coq de compétition	donne coq de compétition, peu servi, dans son jus	0	coq@gmoul.com	NULL	01/02/16	Animaux	Pays  de la loire	Nantes	44000
2	ordinateur transportable	ordinateur transportable 23 pouces de marque soni, remis à zéro pour la vente	1000	bob@bobo.org	601010101	01/02/16	Informatique	Pays de la Loire	Carquefou	44470
3	lit à barreaux	lit bébé à barreaux blanc, vendu sans matelas et sans bébé	80	bob@bobo.org	601010101	01/02/16	Ameublement	Pays de la Loire	Carquefou	44470
4	appartment au bord de la mer	appartement T4 en bord de mer pour sénor avertis, trois chambres, 2 caves, 5 places de parking et piste d'attérissage pour hélicoptère	450000	crevette@pornic.com	826262626	05/02/16	Immobilier	Pays de la Loire	Pornic	44210
5	cartes pokémon collector ultra rares	lot de 5 cartes pokémon rares comprenant un pikachou et deux rondoudons	faire offre	arthur@lol.gro	NULL	04/02/16	Jeux & Jouets	Provence-Alpes-Côte d'Azur	Aix-en-Provence	13100
6	Sous vétements petit navire	ensemble de culottes blanches de la marque petit navire, produit absolument original, quelques taches sont présentes mais rien de grave	10	arthur@lol.gro	NULL	05/02/16	Vétements	Provence-Alpes-Côte d'Azur	Aix-en-Provence	13100
7	Fiat 500 aménagée en Camping Car	Fiat 500, carte grise 12 places aménagée camping car avec lit 3 places, auvent et evier/frigo intégré dans la banquette arrière	15000	landing@cci.fr	645464748	05/02/16	Véhicules	Guyanne	Cayenne	97300
8	Cours particulier de Nyotaimori	propose cours particulier de Nyotaimori, avec ou sens wasabi	100	danone.bala@voi.ne	633940594	05/02/16	Services	Pays de la Loire	La roche sur Yon	85000
9	fèves de paque	lot de fèves dora l'exploratrice usagées, à finir de nettoyer	5	coq@gmoul.com	NULL	06/02/16	Animaux	Pays  de la loire	Nantes	44000
10	sapin de noel	vend cause no crois plus au pere noel, un sapin en plastique avec son lot de boules et plusieurs guirlandes lumineuses	20	brigitteu@edu.gouv	NULL	06/02/16	Décoration	Provence-Alpes-Côte d'Azur	Aix-en-Provence	13100
11	cassette vidéo ayant appartenu à François Mitterand	cassette vidéo vierge certifiée etre passée dans les mains de notre feu président, aucune idée du film...	3000	anon@ce.pr	NULL	06/02/16	Image & son	Pays de la Loire	Saint-Julien-de-Concelles	44450
12	smartefone samsoung	je souhaite vendre, cause triple emploi, un smartefone samsoung absolument neuf et qui a servi 2 ans. Vendu sans batterie, carte sim et écouteurs stéréau. bloqué opérateur lidl mobile	150	arthur@lol.gro	NULL	06/02/16	Informatique	Provence-Alpes-Côte d'Azur	Aix-en-Provence	13100
13	vélo à réparer	je me sépare de mon fidèle desprier, quelques travaux à prévoir: roues, cadre, frein, selle, pneus, pédalier et chaine sont probablement à changer. Affaire à saisir!	120	jack.lang@pouf.pif	NULL	04/02/16	Véhicules	Payse de la loire	Piriac-sur-Mer	44420
14	arbre multi-centenaire	arbre très vieux, je sais pas ce que c'est mais c'est vieux. A venir chercher sur place, prévoir un pelle	NULL	jacque.haricot@magique.conte	NULL	08/02/16	NULL	Pays de la Loire	Saint-Nazaire	44600
15	exercices corrigés de base de données	je met à disposition, contre un petit repas chaleureux agrémenté de boissons agréables, l'ensemble des sujets corrigés du cours de base de données en Licence 1 de l'université de Nantes	NULL	memepaspeur@etu.univ-nantes.fr	NULL	08/02/16	Services	Pays de la Loire	Chéméré	44040
16	T-shirt britney spears	Cause déménagement, je cède à contre coeur, snif, mon t-shirt collector Britney Spears, baby one more time special tour. Objet rare sur le marché, faire offre en accord avec sa valeur sentimentale	NULL	britney@love.actually	 NULL	08/02/16	Vétements	Pays de la Loire	Paimbœuf	44116
17	4x4 de luxe	Suite à un controle fiscal, je vend mon 4x4 de luxe toutes options : accoudoirs chauffants, jantes en bois de chène, aileron sport en titane-carbone, etc.	45000	jean.rapetou@magouille.fr	NULL	08/02/16	Véhicules	Pays de la loire	La Turballe	211
18	maison bourgeoise	Madame et moi-meme souhaiterions nous séparer de notre pied à terre nantais. Il s'agit d'une maison bourgeoise avec 12 chambres, 6 salles de bain et 1 canapé blanc en cuir de vachette	1000000	bour.geois@riche.dollar	9999999999	08/02/16	Immobilier	Pays de la Loire	Nantes	44000
19	kazou numérique	vends un kazou numérique fender à double frete	200	jack.lang@pouf.pif	NULL	09/02/16	Instruments de Musique	Pays de la loire	Piriac-sur-Mer	44420
20	ordinateur de landing	vend cause double emploi, ordinateur de landing de compétition avec clavier, écran,cables et webcam.Très peu servi, sauf projet Java	1000	landing@cci.fr	645464748	05/02/16	Informatique	Guyanne	Cayenne	97300";

$cat = array(
1 => "Animaux",
2 => "Informatique",
3 => "Ameublement",
4 => "Immobilier",
5 => "Jeux & Jouets",
6 => "Vétements",
7 => "Véhicules",
8 => "Services",
9 => "Décoration",
10 => "Image & son",
11 => "Véhicules",
12 => "Instruments de Musique"
);
$viles = array(
1 => "Nantes",
2 => "Carquefou",
3 => "Pornic",
4 => "Aix-en-Provence",
5 => "Cayenne",
6 => "La roche sur Yon",
7 => "Saint-Julien-de-Concelles",
8 => "Piriac-sur-Mer",
9 => "Saint-Nazaire",
10 => "Chéméré",
11 => "Paimbœuf",
12 => "La Turballe"
);
$users = array(
1 => "coq@gmoul.com",
2 => "bob@bobo.org",
3 => "crevette@pornic.com",
4 => "arthur@lol.gro",
5 => "landing@cci.fr",
6 => "danone.bala@voi.ne",
7 => "brigitteu@edu.gouv",
8 => "anon@ce.pr",
9 => "jack.lang@pouf.pif",
10 => "jacque.haricot@magique.conte",
11 => "memepaspeur@etu.univ-nantes.fr",
12 => "britney@love.actually",
13 => "jean.rapetou@magouille.fr",
14 => "bour.geois@riche.dollar"
);


$lines = explode("\n", $data);
$annonces = array();
$sql = "INSERT INTO annonces(id, nom, description, prix, user_id, date, categorie_id, ville_id) VALUES ";
// 
foreach ($lines as $k => $v) {
	$annonces[$k] = explode("	", $v);
}
foreach ($annonces as $k => $v) {
	$v[3] = $v[3] == "NULL" || (is_numeric($v[3]))?$v[3]:'"'.$v[3].'"';
	$v[4] = array_search($v[4], $users);
	$v[6] = Datetime::createFromFormat('d/m/y', $v[6]);
	$v[7] = (in_array($v[7], $cat))?array_search($v[7], $cat):'NULL';
	$v[9] = array_search($v[9], $viles);
	$sql .= '('.$v[0].', "'.$v[1].'", "'.$v[2].'", '.$v[3].', '.$v[4].', "'.$v[6]->format('Y-m-d').'", '.$v[7].', '.$v[9].'),<br />';
}
echo "<hr />Requete SQL : $sql<hr />";
?>
<pre>
	<?php print_r($annonces); ?>
</pre>
