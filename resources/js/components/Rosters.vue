<template>
	<div>
		<div id="teams" class="swiper-container w-full">
			<div class="swiper-wrapper">
				<team v-for="team in teams" :key="team.id" :team="team"></team>
			</div>
			<div id="teams-nav" class="swiper-pagination"></div>
		</div>
	</div>
</template>

<script>
    import Swiper from 'swiper';
	import Team from './rosters/Team';
	
    export default {
        name: "Rosters",
        components: {
            Team,
        },
        data: () => ({
            teams: [
                require('../../data/quimper'),
                require('../../data/nantes'),
                require('../../data/lemans'),
                require('../../data/officiels'),
            ],
        }),
        created ()
        {
            this.$nextTick(() => {
                new Swiper('#teams', {
                    direction: 'vertical',
                    pagination: {
                        el: '#teams-nav',
                    },
                });
            })
        },
    }
</script>

<style scoped>
	.swiper-container {
		height: 85vh;
	}
</style>