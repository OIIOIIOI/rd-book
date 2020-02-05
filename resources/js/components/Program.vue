<template>
	<div class="">
		<h1 class="text-center mt-6">PROGRAMME</h1>
		<div v-for="(day, index) in games" :key="index">
			<h2 class="text-center my-6"><i class="icon ion-md-calendar mr-2"></i><span class="text-pink-400">{{ day.date}}</span></h2>
			<game v-for="game in day.games" :key="game.id" :game="game" :current="isCurrent(game.id)" :class="(game.id % 2) ? 'odd' : 'even'"></game>
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
            games: [],
            current_game: -1,
        }),
	    mounted () {
            let vm = this;
            API.getAllGames(({data}) => {
                vm.games = data;
            });
            API.getCurrentGame(({data}) => {
                vm.current_game = data;
            });
            OWATracker.trackAction('Cooking', 'Recipe Print',  'Best Chicken Parmesan Recipe', 10);
	    },
        methods: {
            isCurrent: function (id) {
                return (id === this.current_game.current);
            },
        },
    }
</script>

<style scoped>

</style>