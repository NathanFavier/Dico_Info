<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Ajouter une définition</title>
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-widht">
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<form action="thank_page.php" method="post" id="adding_form">
			<!-- the top of the adding page (definition name + filters)-->
			<div id="top_add_page">
				<!-- the definition name-->
				<div id="add_exp_div">
					<strong>Expression</strong>
					<input name="add_exp" id="add_exp"/>
				</div>
				<!-- the filter choice part-->
				<div id="add_filters_div">
					<div id="add_filters_top_div">
						<!-- the filters list-->
						<select id="filters" size=1>
							<?php
								foreach(json_decode(file_get_contents("data.json"),true)["filters"] as $filter)
								{
									echo "<option value=".$filter.">".$filter."</option>";
								}
							?>
						</select>
						<!-- the action to do with the currently selected filter-->
						<button type="button" id="add_filter" onClick="addFilter()">Ajouter</button>
						<button type="button" id="remove_filter" onClick="rmFilter()">Supprimer</button>
					</div>
					<div id="add_filters_bottom_div">
						<!-- show the current filter(s) of the expression-->
						<strong>Filtre(s) :</strong>
						<div id="add_filters_list">
						</div>
					</div>
				</div>
			</div>
			<!-- the definition part-->
			<div id="add_def_div">
				<strong>Définition</strong>
				<textarea name="add_def" id="add_def"></textarea>
			</div>
			<!-- the adding definition button-->
			<button type="submit" id="add_button">Ajouter ma définition</button>
			<input type="hidden" id="hidden_filters_list" name="add_filters_list"/>
		</form>
	</body>
</html>