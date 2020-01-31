<template>
	<div class="swiper-slide">
		<img class="w-full h-full object-contain bg-gray-200" :src="img_path">
		<i class="icon ion-md-arrow-round-down absolute bottom-0 text-4xl text-pink-400"></i>
	</div>
</template>

<script>
    export default {
        name: "Help",
        computed: {
            img_path: function () { return 'images/rosters/help.png' },
        },
    }
</script>

<style scoped>
	.swiper-container {
		height: 85vh;
	}
	i.ion-md-arrow-round-down {
		left: 50%;
		transform: translateY(-50%);
	}
</style>