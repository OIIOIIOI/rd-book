<template>
	<div class="">
		<h1 class="text-center mt-6">PROGRAMME</h1>
		<div v-for="(day, index) in games" :key="index">
			<h2 class="text-center my-6"><i class="icon ion-md-calendar mr-2"></i><span class="text-pink-400">{{ day.date}}</span></h2>
			<game v-for="(game, index) in day.games" :key="index" :game="game" :current="isCurrent(game)" :class="(index % 2) ? 'odd' : 'even'"></game>
		</div>
	</div>
</template>

<script>
    import Game from "./program/Game";
    import API from "../api";

    export default {
        name: "Program",
        components: {
            Game,
        },
        data: () => ({
            games: require('../../data/games'),
            current_game: require('../../data/current'),
        }),
        methods: {
            isCurrent: function (game) {
                console.log(parseInt(game.id), parseInt(this.current_game.current));
                return (parseInt(game.id) === parseInt(this.current_game.current));
            },
        },
    }
</script>

<style scoped>

</style>