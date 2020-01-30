<template>
	<div class="swiper-slide"><img class="object-contain bg-white" :src="logo_path"></div>
	<!--<div class="swiper-slide">
		<div :id="slide_id" class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img class="object-contain bg-white" :src="logo_path">
				</div>
			</div>
			<div :id="nav_id" class="swiper-pagination"></div>
		</div>
	</div>-->
</template>

<script>
    export default {
        name: "Team",
        props: {
            team: {
                required: true,
            },
        },
        computed: {
            img_path: function () { return 'images/rosters/' + this.team.folder },
            logo_path: function () { return this.img_path + '/logo.jpg' },
            slide_id: function () { return 'team-' + this.team.folder },
            nav_id: function () { return 'team-' + this.team.folder + '-nav' },
        },
        created() {
        },
    }
</script>

<style scoped>

</style>