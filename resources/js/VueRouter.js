import Vue from 'vue';
import VueRouter from 'vue-router';
//Paginas de la App
import index from './views/index.vue';
import informacion from './views/Informacion.vue';
import paquetes from './views/Paquetes.vue';
import admin from './views/Administrador/admin.vue';
import adminPanel from './views/Administrador/adminPanel.vue';
import adminNewP from './views/Administrador/AdminNewPackage.vue';
import adminDate from './views/Administrador/AdminDate.vue';
import adminNewUser from './views/Administrador/AdminNewUser.vue';
import PageNotFound from './views/PageNotFound.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [{
            path: "/",
            name: "index",
            component: index,
            meta: {
                auth: undefined
            }
        },
        {
            path: "/Paquetes/:numPaquete?",
            name: "paquetes",
            component: paquetes,
            meta: {
                auth: undefined
            }
        },
        {
            path: "/Informacion",
            name: "informacion",
            component: informacion,
            meta: {
                auth: undefined
            }
        },
        {
            path: "/Administrador",
            name: "admin",
            component: admin,
            meta: {
                auth: false
            }
        },
        {
            path: "/Administrador/Panel/Paquetes",
            name: "adminPanel",
            component: adminPanel,
            meta: {
                auth: true
            }
        },
        {
            path: "/Administrador/Panel/Añadir-paquete",
            name: "adminNewP",
            component: adminNewP,
            meta: {
                auth: true
            }
        },
        {
            path: "/Administrador/Panel/Fechas",
            name: "adminDate",
            component: adminDate,
            meta: {
                auth: true
            }
        },
        {
            path: "/Administrador/Panel/Añadir-Usuario",
            name: "adminNewUser",
            component: adminNewUser,
            meta: {
                auth: true
            }
        },
        {
            path: "*",
            component: PageNotFound
        }
    ],
    history:true,
    mode: "history"
})
