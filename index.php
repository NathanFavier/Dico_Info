<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Définition de l'Informatique</title>
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-widht">
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<div id="top_page">
			<div id="title_div">
				<h1 id="title">Les termes informatiques</h1>
			</div>
			<div id="query_param">			
				<input id="searchbar" placeholder="rechercher un terme ..."/>
				<!-- option filters menu-->
				<div id="filter_opt">
					<strong>Filtre</strong>
					<select onchange="getDef()" id="filters" size=1>
						<option value="Aucun" selected>Aucun</option>
						<?php
							foreach(json_decode(file_get_contents("data.json"),true)["filters"] as $filter)
							{
								echo "<option value=".$filter.">".$filter."</option>";
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div id="query_content">
		<script async>getDef();</script>
		</div>
		<div id="bottom_page">
			<div id="bottom_text">
				Ce site est un projet personnel réalisé pour centraliser la masse de termes utilisée dans le domaine de l'informatique.
				Si vous ne trouvez pas une définition que vous connaissez, vous pouvez l'ajouter en cliquant simplement sur "Ajouter ma définition".
			</div>
			<form action="def_adding.php"><button id="b_add_def">Ajouter ma définition</button></form>
		</div>
	</body>
</html>