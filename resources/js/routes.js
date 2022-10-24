import { createRouter, createWebHistory } from 'vue-router'
const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const RoomList = () => import('./components/room/List.vue' /* webpackChunkName: "resource/js/components/room/list" */)
const RoomCreate = () => import('./components/room/Add.vue' /* webpackChunkName: "resource/js/components/room/add" */)
const RoomEdit = () => import('./components/room/Edit.vue' /* webpackChunkName: "resource/js/components/room/edit" */)

const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'roomList',
        path: '/room',
        component: RoomList
    },
    {
        name: 'roomEdit',
        path: '/room/:id/edit',
        component: RoomEdit
    },
    {
        name: 'roomAdd',
        path: '/room/add',
        component: RoomCreate
    }
];

export const router = createRouter({
    history: createWebHistory(),
    routes,
});