import Home from "./components/Home";
import Program from "./components/Program";
import Infos from "./components/Infos";
import Rosters from "./components/Rosters";

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
        name: 'infos',
        path: '/infos',
        component: Infos,
    },
    {
        name: 'rosters',
        path: '/rosters',
        component: Rosters,
    },
]
