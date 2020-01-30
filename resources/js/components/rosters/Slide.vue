<template>
	<div class="swiper-slide">
		<img v-if="lazy" class="swiper-lazy" :data-src="img_path">
		<div v-if="lazy" class="swiper-lazy-preloader swiper-lazy-preloader-pink"></div>
		<img v-if="!lazy" :src="img_path">
		<div class="absolute bottom-0 left-0 w-full flex items-center px-6 py-4 text-white">
			<div class="absolute top-0 left-0 w-full h-full bg-pink-900 opacity-90"></div>
			<span class="relative font-sans font-black text-3xl leading-none mr-4">{{ skater.number }}</span>
			<span class="relative font-sans font-semibold text-2xl leading-none">{{ skater.name }}</span>
		</div>
	</div>
</template>

<script>
    export default {
        name: "Slide",
        props: {
            lazy: {
                required: true,
            },
            folder: {
                required: true,
            },
            skater: {
                required: true,
            },
        },
        computed: {
            img_path: function () { return this.folder + this.skater.src },
        },
        created ()
        {
        
        },
    }
</script>

<style scoped>
	.swiper-slide {
		> div.absolute {
			box-sizing: border-box;
			transform: translateY(100%);
			transition: transform 250ms ease-out;
		}
		&.swiper-slide-active {
			> div.absolute {
				transform: translateY(0);
			}
		}
	}
	img {
		@apply w-full h-full object-cover;
	}
	.swiper-lazy-preloader-pink {
		--swiper-preloader-color: #bc003e;
	}
</style>