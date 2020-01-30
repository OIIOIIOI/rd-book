<template>
	<div class="">
		<h1 class="text-center mt-6">PROGRAMME</h1>
		<h2 class="text-center my-6">Samedi 1er février</h2>
		<game v-for="(game, index) in games" :key="index" :game="game" :class="(index % 2) ? 'odd' : 'even'"></game>
	</div>
</template>

<script>
    import Game from "./program/Game";

    export default {
        name: "Program",
        components: {
            Game,
        },
        data: () => ({
            games: require('../../data/games'),
        }),
    }
</script>

<style scoped>

</style>