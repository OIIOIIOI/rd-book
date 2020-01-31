<template>
	<div class="text-center pb-8">
		<h1 class="uppercase mt-6">Infos pratiques</h1>
		
		<h2 class="mt-8">Où ?</h2>
		<h3 class="text-pink-400 mt-4 mb-1">Gymnase du SUAPS</h3>
		<p class="font-semibold">Université du Maine</p>
		<a href="https://goo.gl/maps/8L4mEVUf6AvM9m7E9" target="_blank" class="block">16 boulevard Charles Nicolle<br>72000 Le Mans</a>
		
		<h2 class="mt-8">Quand ?</h2>
		<h3 class="text-pink-400 mt-4 mb-2">Samedi 1er février</h3>
		<p class="text-lg">Ouverture au public - <span class="font-black text-pink-400">11:00</span></p>
		<p class="text-lg">Premier match - <span class="font-black text-pink-400">12:00</span></p>
		<p class="text-lg">Fermeture des portes - <span class="font-black text-pink-400">19:30</span></p>
		<h3 class="text-pink-400 mt-4 mb-2">Dimanche 2 février</h3>
		<p class="text-lg">Ouverture au public - <span class="font-black text-pink-400">10:30</span></p>
		<p class="text-lg">Premier match - <span class="font-black text-pink-400">11:00</span></p>
		<p class="text-lg">Fermeture des portes - <span class="font-black text-pink-400">17:30</span></p>
		<router-link to="/programme" class="block mt-4">Voir le programme complet</router-link>
	</div>
</template>

<script>
    export default {
        name: "Infos",
    }
</script>

<style scoped>

</style>