import Home from "./components/Home";
import Program from "./components/Program";
import Help from "./components/Help";
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
        name: 'aide',
        path: '/aide',
        component: Help,
    },
    {
        name: 'rosters',
        path: '/rosters',
        component: Rosters,
    },
]
