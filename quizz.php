<?php
//requete nom_quizz
$nom = $_GET['nom'];
$req_quizz = $connectdb->prepare('SELECT * FROM nom_quizz WHERE nom=:param1');
$req_quizz->bindParam(':param1', $nom, PDO::PARAM_STR);
$req_quizz->execute() or exit(print_r($req_quizz->errorInfo()));
while ($req_quizz_res = $req_quizz->fetchObject()) 
{
	$id_quizz = $req_quizz_res->id;
}
?>
<h1>Quizz - <?php echo $nom;?></h1>
<?php

//requete questions
$req_quizz2 = $connectdb->prepare('SELECT * FROM questions WHERE id_quizz=:param2');
$req_quizz2->bindParam(':param2', $id_quizz, PDO::PARAM_INT);
$req_quizz2->execute() or exit(print_r($req_quizz2->errorInfo()));
while ($req_quizz2_res = $req_quizz2->fetchObject()) 
{
	$id_question = $req_quizz2_res->id;
	$nom_question = $req_quizz2_res->nom_question;
	echo'<p>'.$id_question.' - '.$nom_question.'</p>
	<ul>';
	//requete réponses
	$req_quizz3 = $connectdb->prepare('SELECT * FROM reponses WHERE id_question=:param3');
	$req_quizz3->bindParam(':param3', $id_question, PDO::PARAM_INT);
	$req_quizz3->execute() or exit(print_r($req_quizz3->errorInfo()));
	while ($req_quizz3_res = $req_quizz3->fetchObject()) 
	{
		$id_reponse = $req_quizz3_res->id;
		$nom_reponse = $req_quizz3_res->nom_reponse;
		$vrai = $req_quizz3_res->vrai;
		echo'<li><code> '.htmlentities($nom_reponse).' - '.$vrai.' </code></li>';
	}
	
	echo'</ul>';
	
}

?>