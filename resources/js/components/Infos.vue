<template>
	<div class="text-center pb-8">
		<h1 class="uppercase mt-6">Infos pratiques</h1>
		
		<h2 class="mt-8"><i class="icon ion-md-pin mr-2"></i>Où ?</h2>
		<h3 class="text-pink-400 mt-4 mb-1">Gymnase du SUAPS</h3>
		<p class="font-semibold">Université du Maine</p>
		<a href="https://goo.gl/maps/8L4mEVUf6AvM9m7E9" target="_blank" class="block">16 boulevard Charles Nicolle<br>72000 Le Mans</a>
		
		<h2 class="mt-8"><i class="icon ion-md-time mr-2"></i>Quand ?</h2>
		<h3 class="text-pink-400 mt-4 mb-2">Samedi 1er février</h3>
		<p class="text-lg">Ouverture au public - <span class="font-black text-pink-400">11:00</span></p>
		<p class="text-lg">Premier match - <span class="font-black text-pink-400">12:00</span></p>
		<p class="text-lg">Fermeture des portes - <span class="font-black text-pink-400">19:30</span></p>
		<h3 class="text-pink-400 mt-4 mb-2">Dimanche 2 février</h3>
		<p class="text-lg">Ouverture au public - <span class="font-black text-pink-400">10:30</span></p>
		<p class="text-lg">Premier match - <span class="font-black text-pink-400">11:00</span></p>
		<p class="text-lg">Fermeture des portes - <span class="font-black text-pink-400">17:30</span></p>
		<router-link to="/programme" class="block mt-4">Voir le programme complet</router-link>
		
		<h2 class="mt-8 mb-3"><i class="icon ion-md-cash mr-2"></i>Combien ?</h2>
		<p class="text-lg">Moins de 12 ans - <span class="font-semibold text-pink-400">Gratuit</span></p>
		<p class="text-lg">Journée - <span class="font-semibold text-pink-400">4€</span></p>
		<p class="text-lg">Pass week-end - <span class="font-semibold text-pink-400">7€</span></p>
		
		<h2 class="mt-8 mb-3"><i class="icon ion-md-add-circle mr-2"></i>Services</h2>
		<p class="text-lg"><i class="icon ion-md-beer text-pink-400 mr-2"></i>Buvette/Snack *</p>
		<p class="text-lg"><i class="icon ion-md-shirt text-pink-400 mr-2"></i>Merch *</p>
		<p class="text-lg"><i class="icon ion-md-microphone text-pink-400 mr-2"></i>Commentaires en direct</p>
		<p class="text-lg"><i class="icon ion-md-videocam text-pink-400 mr-2"></i><a href="https://www.youtube.com/channel/UCCAIZYuMmGPK_xwBAtjrIxw" target="_blank">Livestream</a></p>
		<p class="text-sm mt-2">* <i class="icon ion-md-card text-pink-400 mr-1"></i>CB acceptée</p>
	</div>
</template>

<script>
    export default {
        name: "Infos",
    }
</script>

<style scoped>

</style>