<template>
	<div class="">
		<h1 class="text-center mt-6">PROGRAMME</h1>
		<div v-for="(day, index) in games" :key="index">
			<h2 class="text-center my-6">{{ day.date}}</h2>
			<game v-for="(game, index) in day.games" :key="index" :game="game" :class="(index % 2) ? 'odd' : 'even'"></game>
		</div>
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