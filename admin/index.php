<?php
$str_data = file_get_contents("../resources/data/marquee.json");
$data = json_decode($str_data,true);
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
	<ul class="my-16">
		<li>
			<span class='uppercase font-black'>Prochain match</span> à <span class='font-semibold'>[TIME]</span> - <span class='font-semibold'>[TEAM_A]</span> vs <span class='font-semibold'>[TEAM_B]</span>
		</li>
		<li>
			<span class='uppercase font-black'>Score à la mi-temps</span> : <span class='font-semibold'>[TEAM_A]</span> <span class="font-black">[SCORE_A]</span> vs <span class="font-black">[SCORE_B]</span> <span class='font-semibold'>[TEAM_B]</span>
		</li>
		<li>
			<span class='uppercase font-black'>Score final</span> : <span class='font-semibold'>[TEAM_A]</span> <span class="font-black">[SCORE_A]</span> vs <span class="font-black">[SCORE_B]</span> <span class='font-semibold'>[TEAM_B]</span>
		</li>
		<li>
			<span class='uppercase font-black'>C'est fini pour aujourd'hui !</span> Rendez-vous pour l'<span class='font-semibold'>after à l'Elephant Pub</span>, place d'Alger
		</li>
		<li>
			<span class='uppercase font-black'>Fin de l'étape !</span> <span class='font-semibold'>Un grand merci au public, aux équipes, aux officiels, aux bénévoles et à nos partenaires</span> pour avoir fait de cet évènement un succès ! <span class='font-black'><3</span>
		</li>
	</ul>
	<div class="">
		<h1 class="">Bandeau d'infos</h1>
		<h2 class="">Contenu actuel :</h2>
		<ul class="">
			<?php foreach ($data['lines'] as $line) : ?>
				<li><?php echo $line; ?></li>
			<?php endforeach; ?>
		</ul>
		<h2 class="">Mise à jour</h2>
		<form action="">
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
			<input type="submit" value="Valider">
		</form>
	</div>
	<div class="mt-8">
		<h1 class="">Scores</h1>
		<h2 class="">Scores actuels :</h2>
		<h2 class="">Mise à jour</h2>
		<form action="">
			<input type="submit" value="Valider">
		</form>
	</div>
</body>
</html>
