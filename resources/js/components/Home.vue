<template>
	<div class="">
		<img class="w-full" src="images/N2E2.jpg" alt="Affiche N2 Le Mans">
		<p class="text-center text-sm py-1">Affiche par <span class="font-semibold">Solène Gaudin</span></p>
		<div class="w-full bg-white text-pink-400 flex justify-between">
			<a href="https://www.youtube.com/channel/UCCAIZYuMmGPK_xwBAtjrIxw" target="_blank">
				<i class="icon block text-3xl ion-logo-youtube"></i>
				<span class="block font-semibold text-sm">YouTube</span>
			</a>
			<a href="https://www.facebook.com/events/2504096849803373/" target="_blank">
				<i class="icon block text-3xl ion-logo-facebook"></i>
				<span class="block font-semibold text-sm">Facebook</span>
			</a>
			<a href="https://www.instagram.com/rollerderby72.lemans/" target="_blank">
				<i class="icon block text-3xl ion-logo-instagram"></i>
				<span class="block font-semibold text-sm">Instagram</span>
			</a>
		</div>
	</div>
</template>

<script>
    export default {
        name: "Home",
    }
</script>

<style scoped>
	a {
		@apply flex-auto text-center no-underline py-4;
	}
</style>