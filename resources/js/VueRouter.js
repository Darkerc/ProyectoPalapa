import Vue from 'vue';
import VueRouter from 'vue-router';
import index from './views/index.vue';
import informacion from './views/Informacion.vue';
import paquetes from './views/Paquetes.vue';
import nosotros from './views/Nosotros.vue';
import admin from './views/Administrador/admin.vue';
import adminPanel from './views/Administrador/adminPanel.vue';
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
            path: "/Nosotros",
            name: "nosotros",
            component: nosotros,
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
            path: "*",
            component: PageNotFound
        }
    ],
    history:true,
    mode: "history"
})
