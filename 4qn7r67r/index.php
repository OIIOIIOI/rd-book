<?php
$SOURCE_LINES_FILE = "../resources/data/source_lines.json";
$MARQUEE_FILE = "../resources/data/marquee.json";
$GAMES_FILE = "../resources/data/games.json";
$CURRENT_FILE = "../resources/data/current.json";

//chmod($CURRENT_FILE, 0777);

$data_source_lines = json_decode(file_get_contents($SOURCE_LINES_FILE),true);
$data_lines = json_decode(file_get_contents($MARQUEE_FILE),true);
$data_games = json_decode(file_get_contents($GAMES_FILE),true);

$handle = fopen($CURRENT_FILE, 'r');
$read = fread($handle, filesize($CURRENT_FILE));
fclose($handle);
$data_current = json_decode($read,true);

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	// Update scores
	if ($action == 'update_scores')
	{
		$scores_game = $_POST['scores_game'];
		$score_team_a = $_POST['score_team_a'];
		$score_team_b = $_POST['score_team_b'];
		$game_over = isset($_POST['is_over']);
		
		// Find target game data
		$found = false;
		foreach ($data_games as $key_d => $day)
		{
			foreach ($data_games[$key_d]['games'] as $key_g => $game)
			{
				if ($game['id'] == $scores_game)
				{
					$data_games[$key_d]['games'][$key_g]['scores'][0] = $score_team_a;
					$data_games[$key_d]['games'][$key_g]['scores'][1] = $score_team_b;
					$data_games[$key_d]['games'][$key_g]['over'] = $game_over;
					$found = true;
					break 2;
				}
			}
		}
		
		if ($found)
			file_put_contents($GAMES_FILE, json_encode($data_games));
	}
	// Update lines
	else if ($action == 'update_current')
	{
		$current_game = $_POST['current_game'];
		$data_current['current'] = intval($current_game);
		
		$handle = fopen($CURRENT_FILE, 'w+');
		fwrite($handle, json_encode($data_current));
		fclose($handle);
//		file_put_contents($CURRENT_FILE, json_encode($data_current));
	}
	// Update lines
	else if ($action == 'update_lines')
	{
		$line_text = $_POST['line_text'];
		$line_actual_text = $data_source_lines[$line_text];
		$line_game = $_POST['line_game'];
		$custom_msg = $_POST['custom_msg'];
		$overwrite = ($_POST['overwrite'] == 'true') ? true : false;
		
		// Find target game data
		$game_infos = null;
		foreach ($data_games as $day)
		{
			foreach ($day['games'] as $game)
			{
				if ($game['id'] == $line_game)
				{
					$game_infos = $game;
					break 2;
				}
			}
		}
		// Replace string variables
		$keys = array(
			"[TIME]",
			"[TEAM_A]",
			"[TEAM_B]",
			"[SCORE_A]",
			"[SCORE_B]",
			"[MSG]",
		);
		$values = array(
			$game_infos['time'],
			$game_infos['teams'][0]['name'],
			$game_infos['teams'][1]['name'],
			$game_infos['scores'][0],
			$game_infos['scores'][1],
			$custom_msg,
		);
		$line_actual_text = str_replace($keys, $values, $line_actual_text);
		
		if ($overwrite)
			$data_lines['lines'] = [$line_actual_text];
		else
			$data_lines['lines'][] = $line_actual_text;
		
		file_put_contents($MARQUEE_FILE, json_encode($data_lines));
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
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body class="font-sans bg-gray-200 text-pink-900 p-8">
	<div class="flex justify-between">
		<a href="/" class="block flex-grow px-4 py-2 mr-2 text-xl text-center no-underline bg-pink-400 text-white hover:text-white"><i class="icon ion-md-arrow-round-back mr-2"></i>Retour</a>
		<a href="/4qn7r67r" class="block flex-grow px-4 py-2 ml-2 text-xl text-center no-underline bg-pink-400 text-white hover:text-white"><i class="icon ion-md-refresh mr-2"></i>Actualiser</a>
	</div>
	<div class="mt-16">
		<h1 class="">Match en cours</h1>
		<p class="bg-black text-pink-100 mt-2 py-1 px-2 font-semibold">
			<?php
			$cg = 'Aucun';
			foreach ($data_games as $day) {
				foreach ($day['games'] as $game) {
					if ($game['id'] == $data_current['current'])
					{
						$cg = $game['title'];
						break 2;
					}
				}
			}
			echo $cg;
			?>
		</p>
		<h2 class="mt-3">Mise à jour</h2>
		<form action="" method="post">
			<label for="current_game_select" class="block mt-2">Match :</label>
			<select name="current_game" id="current_game_select">
				<option value="-1">Aucun</option>
				<option value="0">Match 1 : Divines - Morues</option>
				<option value="1">Match 2 : Bomb'Hard - Pétroleuses</option>
				<option value="2">Match 3 : Toutes Etoiles - Missfeet</option>
				<option value="3">Match 4 : Divines - Pétroleuses</option>
				<option value="4">Match 5 : Missfeet - Morues</option>
			</select>
			<input type="hidden" name="action" value="update_current">
			<input type="submit" value="Valider" class="mt-4">
		</form>
	</div>
	<div class="mt-16">
		<h1 class="">Scores</h1>
		<h2 class="mt-3">Scores actuels :</h2>
		<ul class="bg-black text-pink-100 mt-2 py-1">
			<?php foreach ($data_games as $day) : ?>
				<?php
				foreach ($day['games'] as $game) :
					$content = $game['title'].' :';
					$content .= '<span class="font-semibold mx-3">'.implode(" - ", $game['scores']).'</span>';
					if ($game['over'])
						$content .= '(TERMINÉ)';
					?>
					<li class="px-2"><?php echo $content; ?></li>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</ul>
		<h2 class="mt-3">Mise à jour</h2>
		<form action="" method="post">
			<label for="scores_game_select" class="block mt-2">Match :</label>
			<select name="scores_game" id="scores_game_select">
				<option value="0">Match 1 : Divines - Morues</option>
				<option value="1">Match 2 : Bomb'Hard - Pétroleuses</option>
				<option value="2">Match 3 : Toutes Etoiles - Missfeet</option>
				<option value="3">Match 4 : Divines - Pétroleuses</option>
				<option value="4">Match 5 : Missfeet - Morues</option>
			</select>
			<div class="flex justify-between">
				<div class="flex-grow mt-2 mr-2">
					<label for="score_team_a">Team A :</label>
					<input type="number" name="score_team_a" id="score_team_a" value="0" min="0">
				</div>
				<div class="flex-grow mt-2 ml-2">
					<label for="score_team_b">Team B :</label>
					<input type="number" name="score_team_b" id="score_team_b" value="0" min="0">
				</div>
			</div>
			<div class="block mt-2">
				<input type="checkbox" name="is_over" id="is_over"><label for="is_over" class="inline-block ml-2 py-2">Match terminé</label>
			</div>
			<input type="hidden" name="action" value="update_scores">
			<input type="submit" value="Valider" class="mt-4">
		</form>
	</div>
	<div class="mt-16">
		<h1 class="mt-4">Bandeau d'info</h1>
		<h2 class="mt-3">Contenu actuel :</h2>
		<ul class="bg-black text-pink-100 mt-2 py-1">
			<?php foreach ($data_lines['lines'] as $line) : ?>
				<li class="px-2"><?php echo $line; ?></li>
			<?php endforeach; ?>
		</ul>
		<h2 class="mt-3">Mise à jour</h2>
		<form action="" method="post" class="mt-2">
			<label for="line_select">Nouvelle ligne :</label>
			<select name="line_text" id="line_select">
				<option value="next_game">Prochain match</option>
				<option value="game_started">Match lancé</option>
				<option value="half_time">Half-time</option>
				<option value="final_score">Final score</option>
				<option value="saturday_night">Saturday night</option>
				<option value="the_end">The End</option>
				<option value="custom">Custom</option>
			</select>
			<label for="game_select" class="block mt-2">Match :</label>
			<select name="line_game" id="game_select">
				<option value="0">Match 1 : Divines - Morues</option>
				<option value="1">Match 2 : Bomb'Hard - Pétroleuses</option>
				<option value="2">Match 3 : Toutes Etoiles - Missfeet</option>
				<option value="3">Match 4 : Divines - Pétroleuses</option>
				<option value="4">Match 5 : Missfeet - Morues</option>
			</select>
			<label for="custom_msg" class="block mt-2">Custom message :</label>
			<input type="text" name="custom_msg" placeholder="Custom message" id="custom_msg" class="w-full px-4 py-3 mt-2">
			<div class="block mt-2">
				<input type="radio" name="overwrite" value="true" id="ow_true" checked><label for="ow_true" class="inline-block ml-2 py-2">Écraser l'existant</label>
			</div>
			<div class="block">
				<input type="radio" name="overwrite" value="false" id="ow_false"><label for="ow_false" class="inline-block ml-2 py-2">Ajouter à la suite</label>
			</div>
			<input type="hidden" name="action" value="update_lines">
			<input type="submit" value="Valider" class="mt-4">
		</form>
	</div>
</body>
</html>
