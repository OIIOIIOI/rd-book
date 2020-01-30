<template>
	<div class="swiper-slide">
		<div :id="slide_id" class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img class=" w-full h-full object-contain bg-white" :src="logo_path">
				</div>
				<slide v-for="(skater, index) in team.roster" :key="index" :folder="img_path" :lazy="lazy" :skater="skater"></slide>
			</div>
			<div :id="nav_id" class="swiper-pagination"></div>
		</div>
	</div>
</template>

<script>
    import Swiper from "swiper";
    import Slide from "./Slide";

    export default {
        name: "Team",
        components: {
            Slide,
        },
        data: () => ({
	        sw: null,
	        lazy: true,
        }),
        props: {
            team: { required: true },
        },
        computed: {
            img_path: function () { return 'images/rosters/' + this.team.folder + '/' },
            logo_path: function () { return this.img_path + 'logo.jpg' },
            slide_id: function () { return 'team-' + this.team.folder },
            nav_id: function () { return 'team-' + this.team.folder + '-nav' },
        },
        created ()
        {
            let vm = this;
            this.$nextTick(() => {
                // Init slider
                vm.sw = new Swiper ('#'+vm.slide_id, {
                    lazy: vm.lazy,
                    pagination: {
                        el: '#'+vm.nav_id,
                        type: 'progressbar',
                    },
                });
            });
        },
    }
</script>

<style scoped>
	.swiper-container {
		width: 100%;
		height: 85vh;
	}
</style>