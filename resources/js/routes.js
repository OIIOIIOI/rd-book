import Home from "./components/Home";
import Program from "./components/Program";
import Infos from "./components/Infos";
import Rosters from "./components/Rosters";
import Rules from "./components/Rules";

export default [
    {
        name: 'home',
        path: '/',
        component: Home,
    },
    {
        name: 'program',
        path: '/programme',
        component: Program,
    },
    {
        name: 'rosters',
        path: '/rosters',
        component: Rosters,
    },
    {
        name: 'rules',
        path: '/rules',
        component: Rules,
    },
    {
        name: 'infos',
        path: '/infos',
        component: Infos,
    },
]
