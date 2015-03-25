<?php
isset($_GET['cat'])?$cat=$_GET['cat'] :$cat="ajouter-questions";
include("ajouter_quizz_fonctions.php");

if($cat=="ajouter-quizz")
{
    ?>
    <h1>Ajouter un quizz</h1>
    <?php
}
elseif($cat=="ajouter-questions")
{
    ?>
    <h1>Ajouter des questions</h1>
<?php
}
elseif($cat=="fichier-texte")
{
    ?>
    <h1>Fichier texte</h1>
    <?php
    if(isset($_POST['validation']))
    {
        $nomfichier = $_POST['nomfichier'];
        $nomquizz = $_POST['nomquizz'];
        retourner_ligne2($nomfichier, $nomquizz);
    }
    else
    {
        ?>
        <form class="inserer_texte" method="post">
            <p><label for="nomquizz">Dans quel quizz</label>
            <select name="nomquizz">
                <?php
                selectionner_quizz();
                ?>
            </select>
            </p>
            <p>
            <label for="nomfichier">Nom du fichier .txt</label>
            <input type="text" name="nomfichier" length="30" max-width="50" placeholder="Nom du fichier" required="required" />.txt
            </p>
            <input type="submit" value="valider" name="validation">
        </form>
        <?php
    }
}
else
{

}


?>

<?php
//1-HTML
//2-CSS
//3-Javascript
//4-C++
?>