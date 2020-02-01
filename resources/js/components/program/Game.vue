<template>
	<section :class="classes">
		<p class="text-center font-semibold">
			<span class="text-xl">{{ game.title }}</span> - <span class="text-pink-400 text-2xl">{{ game.time }}</span>
		</p>
		<p class="team-a">
			<i v-if="teamAWon" class="icon ion-md-star text-pink-400 text-xl mr-1"></i>
			<span class="font-semibold text-pink-600 text-lg">{{ game.teams[0].name }}</span> (<span class="">{{ game.teams[0].city }}</span>)
			<i v-if="teamAWon" class="icon ion-md-star text-pink-400 text-xl ml-1"></i>
		</p>
		<p class="text-center flex items-center justify-center">
			<span class="font-black text-2xl text-pink-400" v-if="game.over">{{ game.scores[0] }}</span>
			<span class="text-sm mx-2">-vs-</span>
			<span class="font-black text-2xl text-pink-400" v-if="game.over">{{ game.scores[1] }}</span>
		</p>
		<p class="team-b">
			<i v-if="teamBWon" class="icon ion-md-star text-pink-400 text-xl mr-1"></i>
			<span class="font-semibold text-pink-600 text-lg">{{ game.teams[1].name }}</span> (<span class="">{{ game.teams[1].city }}</span>)
			<i v-if="teamBWon" class="icon ion-md-star text-pink-400 text-xl ml-1"></i>
		</p>
	</section>
</template>

<script>
    export default {
        name: "Game",
        props: {
            game: { required: true },
            current: { required: true },
        },
        computed: {
            classes: function () {
                let a = [];
                if (this.game.over) a.push('is-over');
                if (this.current) a.push('is-current');
                return a.join(' ');
            },
            teamAWon: function () {
                return (this.game.scores[0] > this.game.scores[1]) && this.game.over;
            },
            teamBWon: function () {
                return (this.game.scores[1] > this.game.scores[0]) && this.game.over;
            }
        },
    }
</script>

<style scoped>
	section {
		@apply px-6 pt-4 pb-6;
		
		.team-a,
		.team-b {
			@apply text-center;
		}
		&.even {
			@apply bg-gray-100;
		}
		&.is-over {
			@apply opacity-50;
		}
		&.is-current {
			@apply border-pink-400 border-l-12 border-r-12;
		}
	}
</style>
