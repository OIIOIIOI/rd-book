<template>
	<div>
		<marquee-text :duration="10">Prochain match : les <span class="font-bold">Divines Machines</span> vs les Bomb-Hard</marquee-text>
		<h2>ACCUEIL</h2>
	</div>
</template>

<script>
	import MarqueeText from 'vue-marquee-text-component';
	
    export default {
        name: "Home",
	    components: {
            MarqueeText,
	    },
    }
</script>

<style scoped>
	.marquee-text-wrap {
		@apply py-3 bg-black text-pink-200;
	}
	.marquee-text-text {
		@apply px-6;
	}
</style>