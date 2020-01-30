<template>
	<div>
		<div class="h-header z-10 w-full bg-pink-900 text-pink-400 flex justify-between">
			<router-link to="/"><i class="icon ion-md-home"></i></router-link>
			<router-link to="/programme"><i class="icon ion-md-stopwatch"></i></router-link>
			<router-link to="/aide"><i class="icon ion-md-help"></i></router-link>
			<router-link to="/rosters"><i class="icon ion-md-contacts"></i></router-link>
		</div>
		<marquee-text :duration="duration">
			<span class="px-4 border-r-2 border-pink-400" v-for="line in marqueeLines" v-html="line"></span>
		</marquee-text>
	</div>
</template>

<script>
    import MarqueeText from 'vue-marquee-text-component';
    import API from "../api";

    export default {
        name: "AppHeader",
        components: {
            MarqueeText,
        },
        data: () => ({
            marqueeLines: [],
        }),
        computed: {
            duration: function () { return this.marqueeLines.length * 5; },
        },
        mounted () {
            this.getMarquee();
        },
	    methods: {
            getMarquee: function ()
            {
                let vm = this;
                API.getMarquee(({data}) => {
                    vm.marqueeLines = data.lines;
                });
                _.delay(vm.getMarquee, 60000);
            },
	    },
    }
</script>

<style scoped>
	a {
		@apply h-header leading-header text-3xl px-3 flex-auto text-center;
		transition: color 200ms, background-color 200ms;
		
		&.exact-active {
			@apply bg-pink-400 text-white;
		}
	}
	.marquee-text-wrap {
		@apply h-marquee leading-marquee bg-black text-pink-100;
	}
</style>