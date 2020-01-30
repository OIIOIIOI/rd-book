<template>
	<div class="h-header z-10 w-full bg-pink-900 text-pink-400 flex justify-between">
		<router-link to="/"><i class="icon ion-md-home"></i></router-link>
		<router-link to="/programme"><i class="icon ion-md-stopwatch"></i></router-link>
		<router-link to="/aide"><i class="icon ion-md-help"></i></router-link>
		<router-link to="/rosters"><i class="icon ion-md-contacts"></i></router-link>
	</div>
</template>

<script>
    export default {
        name: "AppHeader"
    }
</script>

<style scoped>
	a {
		@apply h-header leading-header text-3xl px-3 flex-auto text-center;
		transition: color 200ms, background-color 200ms;
		
		&.exact-active {
			@apply bg-pink-400 text-white;
		}
	}
</style>
