import VueRouter from 'vue-router'
import routes from './routes'

window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = require('vue');

// Vue Router -----------
Vue.use(VueRouter);
const router = new VueRouter({
    linkActiveClass: 'active',
    linkExactActiveClass: 'exact-active',
    routes,
});

// Base components -----------
Vue.component('app-header', require('./components/AppHeader').default);

const app = new Vue({
    el: '#app',
    router,
    data: {
        message: 'Hello Vue!'
    }
});

/*const $ = require('jquery');
const _ = require('lodash');
import Swiper from 'swiper';

const SW_LAZY = false;
const data_teams = [
    require('../../images/rosters/quimper/quimper'),
    require('../../images/rosters/nantes/nantes'),
];


$(document).ready(function ($)
{
    new Swiper('#teams', {
        direction: 'vertical',
        pagination: {
            el: '#teams-nav',
        },
    });

    _.forEach(data_teams, function (team)
    {
        console.log(team.name, team.league);

        let sw = new Swiper ('#team-'+team.folder, {
            lazy: SW_LAZY,
            pagination: {
                el: '#team-'+team.folder+'-nav',
                type: 'progressbar',
                // dynamicBullets: true,
            },
        });
        _.forEach(team.roster, function (skater)
        {
            console.log(skater.number, skater.name);
            // Open slide
            let slide = '<div class="swiper-slide">';
            // Add image
            if (SW_LAZY)
            {
                slide += '<img class="swiper-lazy" data-src="images/rosters/'+team.folder+'/'+skater.src+'">';
                slide += '<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>';
            }
            else
                slide += '<img class="" src="images/rosters/'+team.folder+'/'+skater.src+'">';
            // Add infos
            slide += '<div class="infos absolute bottom-0 left-0 w-full px-6 py-4 text-white">' +
                '<div class="infos-bg absolute top-0 left-0 w-full h-full bg-pink-900 opacity-90"></div>' +
                '<span class="relative infos-number">'+skater.number+'</span>' +
                '<span class="relative infos-name">'+skater.name+'</span>' +
                '</div>';
            // Close slide
            slide += '</div>';
            // Append slide
            sw.appendSlide(slide);
        });
        team.swiper = sw;
    });
});*/
