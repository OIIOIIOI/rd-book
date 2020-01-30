<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Livret Nationale 2 Etape 2</title>
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-white text-pink-900">
	<div id="app-wrapper" class="flex flex-col w-screen h-screen overflow-hidden">
		<?php @include 'template-parts/header.php'; ?>
		<div id="app-content" class="flex-grow w-full bg-gray-300">
			<div id="teams" class="swiper-container">
				<div class="swiper-wrapper">
					<!-- QUIMPER -->
					<div class="swiper-slide">
						<div id="team-quimper" class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<img class="object-contain bg-white" src="images/rosters/quimper/logo.jpg">
								</div>
							</div>
							<div id="team-quimper-nav" class="swiper-pagination"></div>
						</div>
					</div>
					<!-- NANTES -->
					<div class="swiper-slide">
						<div id="team-nantes" class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide"><img class="object-contain bg-white" src="images/rosters/nantes/logo.jpg"></div>
							</div>
							<div id="team-nantes-nav" class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				<div id="teams-nav" class="swiper-pagination"></div>
			</div>
		</div>
	</div>
	
	<script src="js/app.js"></script>
</body>
</html>