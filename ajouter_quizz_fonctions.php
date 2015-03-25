<?php
function remplacer_carac($param1)
{
    $search = array('\'');
    $replace  = array('\'\'');
    $tata = str_replace($search, $replace, $param1);
    return $tata;
}
function selectionner_quizz()
{
    global $connectdb;
    $req = $connectdb->prepare('SELECT * FROM nom_quizz');
    $req -> execute() or exit(print_r($req->errorInfo()));
    while($results = $req->fetchObject())
    {
        $res1 = $results ->id;
        $res2 = $results ->nom;
        echo'<option value="'.$res1.'"> '.$res2.'</option>';
    }

}
function retourner_ligne2($param1, $param2)
{
    global $connectdb;

    $fichier = file_get_contents($param1 . '.txt', FILE_USE_INCLUDE_PATH);
    $fichier = str_replace("\n", "²", $fichier);
    $fichier2 = explode("²", $fichier);

    $n = sizeof($fichier2);
    for ($i = 0; $i <= $n - 1; $i++) {
        /*On lit la ligne courante*/
        $ligne = $fichier2[$i];

        //si c'est la ligne 0 ou multiple de 5, c'est la question
        if ($i % 5 == 0 || $i == 0) {
            $req = $connectdb->prepare('INSERT INTO questions VALUES(NULL, :param2, :param1)');
            $req->bindParam(':param1', $ligne, PDO::PARAM_STR);
            $req->bindParam(':param2', $param2, PDO::PARAM_STR);
            $req->execute() or exit(print_r($req->errorInfo()));
        } //si c'est la première ligne ou multiple de 5, c'est la bonne réponse
        elseif (($i - 1) % 5 == 0 || $i == 1) {
            $req_count = $connectdb->prepare('SELECT id FROM questions ORDER BY id DESC LIMIT 1');
            $req_count->execute() or exit(print_r($req_count->errorInfo()));
            while ($req_count_res = $req_count->fetchObject()) {
                $id_question = $req_count_res->id;
            }

            $req = $connectdb->prepare('INSERT INTO reponses VALUES(NULL, :param3, :param2, :param1, 1)');
            $req->bindParam(':param1', $ligne, PDO::PARAM_STR);
            $req->bindParam(':param2', $id_question, PDO::PARAM_INT);
            $req->bindParam(':param3', $param2, PDO::PARAM_INT);
            $req->execute() or exit(print_r($req->errorInfo()));

        } //Sinon ce sont de mauvaises réponses
        else {
            $req = $connectdb->prepare('INSERT INTO reponses VALUES(NULL, :param3, :param2, :param1, 0)');
            $req->bindParam(':param1', $ligne, PDO::PARAM_STR);
            $req->bindParam(':param2', $id_question, PDO::PARAM_INT);
            $req->bindParam(':param3', $param2, PDO::PARAM_INT);
            $req->execute() or exit(print_r($req->errorInfo()));
        }
    }
}
?>