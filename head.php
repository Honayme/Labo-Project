<ul>
<?php
$req_categories = $connectdb->prepare('SELECT * FROM nom_quizz ORDER BY nom ASC');
$req_categories->execute() or exit(print_r($req_categories->errorInfo()));
while ($req_categories_res = $req_categories->fetchObject()) 
{
	$id = $req_categories_res->id;
	$nom = $req_categories_res->nom;
	echo'<li><a href="index.php?page=quizz&nom='.$nom.'">'.$nom.'</a></li>';
}
?><li><a href="index.php?page=ajouter_quizz">Gestion des quizz</a>
        <ul>
            <li><a href="index.php?page=ajouter_quizz&cat=ajouter-quizz">Ajouter un quizz</a></li>
            <li><a href="index.php?page=ajouter_quizz&cat=ajouter-questions">Ajouter questions</a></li>
            <li><a href="index.php?page=ajouter_quizz&cat=fichier-texte">Fichier texte</a></li>
        </ul>
    </li>
</ul>
