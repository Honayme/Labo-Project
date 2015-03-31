<?php


function rechercher_id($param1)
{
    global $connectdb;
    $req = $connectdb->prepare('SELECT * FROM nom_quizz WHERE nom=:param1');
    $req->bindParam(':param1', $param1, PDO::PARAM_STR);
    $req->execute() or exit(print_r($req->errorInfo()));
    while ($req_res = $req->fetchObject())
    {
        return $req_res->id;
    }
}

function afficher_nbquestions($param1)
{
    global $connectdb;
    //requete questions
    $req = $connectdb->prepare('SELECT * FROM questions WHERE id_quizz=:param1');
    $req->bindParam(':param1', $param1, PDO::PARAM_INT);
    $req->execute() or exit(print_r($req->errorInfo()));
    return $req->rowCount();
}
//requete nom_quizz
function rand_questions($param1)
{
    $arr = array();
    $i = 0;
    while(sizeof($arr)<10)
    {
        $new = rand("1"-$param1);
        while(in_array($new, $arr))
        {
            $new = rand("1"-$param1);
        }
        $arr[$i] = $new;
        $i++;
    }
    return $arr;
}

function afficher_question($param1)
{
    global $connectdb;
    $req = $connectdb->prepare('SELECT * FROM questions WHERE id=:param1');
    $req->bindParam(':param1', $param1, PDO::PARAM_INT);
    $req->execute() or exit(print_r($req->errorInfo()));
    while ($req_res = $req->fetchObject()) {
        $id_question = $req_res->id;
        $nom_question = $req_res->nom_question;
    }
}
function afficher_reponse()
{

}
?>