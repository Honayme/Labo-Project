<?php 
//variables
$user = 'root';
$pass = '';
$dns1 = 'mysql:host=localhost;dbname=quizz';

try {
  $connectdb = new PDO($dns1, $user, $pass);
} catch ( Exception $e ) {
  echo "Connection à MySQL impossible : ", $e->getMessage();
  die();
}
$reqencode = $connectdb->prepare("SET NAMES 'utf8'");
$reqencode->execute();
?>