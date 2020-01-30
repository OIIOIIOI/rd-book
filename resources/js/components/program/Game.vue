<template>
	<section :class="classes">
		<p class="text-center font-semibold">
			<span class="text-xl">{{ game.title }}</span> - <span class="text-pink-600 text-2xl">{{ game.time }}</span>
		</p>
		<p class="team-a"><span class="font-semibold text-pink-600 text-lg">{{ game.teams[0].name }}</span> (<span class="">{{ game.teams[0].city }}</span>)</p>
		<p class="text-center flex items-center justify-center">
			<span class="font-black text-2xl text-pink-400" v-if="game.over">{{ game.scores[0] }}</span>
			<span class="text-sm mx-2">-vs-</span>
			<span class="font-black text-2xl text-pink-400" v-if="game.over">{{ game.scores[1] }}</span>
		</p>
		<p class="team-b"><span class="font-semibold text-pink-600 text-lg">{{ game.teams[1].name }}</span> (<span class="">{{ game.teams[1].city }}</span>)</p>
	</section>
</template>

<script>
    export default {
        name: "Game",
        props: {
            game: { required: true },
        },
        computed: {
            classes: function () {
                let a = [];
                if (this.game.over) a.push('is-over');
                if (this.game.id === 1) a.push('is-current');
                return a.join(' ');
            },
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
			@apply border-pink-400 border-l-8 border-r-8;
		}
	}
</style>