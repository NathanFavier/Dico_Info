<?php
	$tags = array();
	foreach (preg_split("/[\s]+/",$_POST["add_filters_list"]) as $tag)
	{
		if ($tag != "")
		{
			$tags[] = $tag;
		}
	}
	$dico_def = array("expression" => $_POST["add_exp"], "tags" => $tags, "definition" => $_POST["add_def"]);
	
	$jsonDico = json_decode(file_get_contents("data.json"),true);
	$jsonDico["data"][] = $dico_def;
	file_put_contents('data.json',json_encode($jsonDico));
?>
<html lang="fr">
	<h2>Merci de votre contribution</h2>
	<form action="index.php"><button>Retourner à l'accueil</button></form>
</html>