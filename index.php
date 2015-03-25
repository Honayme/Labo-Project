<!DOCTYPE html>
<html>
	<head>
		<title>
		Projet labo dev
		</title>
		<meta charset="UTF-8" />
		<meta name="keywords" content="Quizz informatique" />
		<meta name="description" content="Apprenez facilement les langages informatique avec des quizz" />
		<meta name="author" content="Bruno Guignard" />
		<meta name="publisher" content="Bruno Guignard" />
		<meta name="robots" content="NOODP" />
		<meta name="googlebot" content="NOODP" />
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
	<?php
	include("connexion.php");
	?>
		<nav id="header">
			<?php
			include("head.php");
			?>
		</nav>
		<div id="content">
		<?php
		$page = $_GET['page'];
			if (!$page) 
			{
				include("accueils.php");
			}
			elseif($page=="accueils")
			{
				include("accueils.php");
			}
			elseif($page=="ajouter_quizz")
			{
				include("ajouter_quizz.php");
			}
			elseif($page=="quizz")
			{
				include("quizz.php");
			}
			else
			{
				include("404.php");
			}
			
		?>
		</div>
	</body>
</html>