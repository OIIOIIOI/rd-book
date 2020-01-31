<?php
$data_source_lines = json_decode(file_get_contents("../resources/data/source_lines.json"),true);
$data_lines = json_decode(file_get_contents("../resources/data/marquee.json"),true);

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	// Update scores
	if ($action == 'update_scores')
	{
		echo '<h1 class="text-pink-400">TODO update scores</h1>';
	}
	// Update lines
	else if ($action == 'update_lines')
	{
		$line_game = $_POST['line_game'];
		$line_text = $_POST['line_text'];
		$overwrite = $_POST['overwrite'];
//		$overwrite = isset($_POST['overwrite']) ? true : false;
		
		var_dump($line_game);
		var_dump($data_source_lines[$line_text]);
		var_dump($overwrite);
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body class="font-sans bg-gray-200 text-pink-900 p-8">
	<div class="">
		<h1 class="">Bandeau d'infos</h1>
		<h2 class="">Contenu actuel :</h2>
		<ul class="">
			<?php foreach ($data_lines['lines'] as $line) : ?>
				<li><?php echo $line; ?></li>
			<?php endforeach; ?>
		</ul>
		<h2 class="">Mise à jour</h2>
		<form action="" method="post">
			<label for="line-select">Nouvelle ligne :</label>
			<select name="line_text" id="line-select">
				<option value="next_game">Prochain match</option>
				<option value="half_time">Half-time</option>
				<option value="final_score">Final score</option>
				<option value="saturday_night">Saturday night</option>
				<option value="the_end">The End</option>
			</select>
			<label for="game-select">Match :</label>
			<select name="line_game" id="game-select">
				<option value="0">Match 1</option>
				<option value="1">Match 2</option>
				<option value="2">Match 3</option>
				<option value="3">Match 4</option>
				<option value="4">Match 5</option>
			</select>
			<input type="radio" name="overwrite" value="true" id="ow_true"><label for="ow_true" class="ml-2">Écraser l'existant</label>
			<input type="radio" name="overwrite" value="false" id="ow_false"><label for="ow_false" class="ml-2">Ajouter à la suite</label>
			<input type="hidden" name="action" value="update_lines">
			<input type="submit" value="Valider">
		</form>
	</div>
	<div class="mt-8">
		<h1 class="">Scores</h1>
		<h2 class="">Scores actuels :</h2>
		<h2 class="">Mise à jour</h2>
		<form action="" method="post">
			<input type="hidden" name="action" value="update_scores">
			<input type="submit" value="Valider">
		</form>
	</div>
</body>
</html>
