<?php
//requete nom_quizz
isset($_GET['nom'])?:$nom = $_GET['nom']; $nom = false;

if($nom===false)
{
    ?>
    <h1>Choisissez votre quizz</h1>
    <section id="choixquizz">
        <div class="row">
            <div class="cell" id="html">
                <a href=""><div id="html2"></div></a>
            </div>
            <div class="cell" id="css">
                <a href="">
                    <div id="css2">
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="cell" id="cpp">
                <a href="">
                    <div id="cpp2"></div>
                </a>
            </div>
            <div class="cell" id="js">
                <a href="">
                    <div id="js2"></div>
                </a>
            </div>
        </div>
    </section>

    <?php
}
else
{
    include("quizz_fonctions.php");
    $idquizz = rechercher_id($nom);
    $nbquestions = afficher_nbquestions($idquizz);
    //$tab_ordre = rand_questions($nbquestions);
    //$taille_tab = sizeof($tab_ordre);
    ?>
    <h1>Quizz - <?php echo $nom;?> - <?php echo $nbquestions;?> questions </h1>

    <?php
    while($i<$taille_tab)
    {
        afficher_question($i);
        $i++;
    }
    
    //requete questions
    $req_quizz2 = $connectdb->prepare('SELECT * FROM questions WHERE id_quizz=:param2');
    $req_quizz2->bindParam(':param2', $id_quizz, PDO::PARAM_INT);
    $req_quizz2->execute() or exit(print_r($req_quizz2->errorInfo()));
    $nbquestions = $req_quizz2->rowCount();
    echo' - '.$nbquestions.' questions.';
    ?>
    </h1>
        <?php
    $i = 1;
    while ($req_quizz2_res = $req_quizz2->fetchObject())
    {
        $id_question = $req_quizz2_res->id;
        $nom_question = $req_quizz2_res->nom_question;
        echo'<p>'.$i.' - '.$nom_question.'</p>
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
        $i++;
        echo'</ul>';

    }
    
}
?>