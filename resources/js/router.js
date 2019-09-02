import Vue from 'vue'
import Router from 'vue-router'
import {
    store
} from '@/js/stores/index.js'

import IndexPage from '@/js/pages/Index.vue'
import OverviewPage from '@/js/pages/Overview.vue'
import AddressViewPage from '@/js/pages/addresses/View.vue'
import AddressEditPage from '@/js/pages/addresses/Edit.vue'
import AssignmentsPage from '@/js/pages/Assignments.vue'
import ManagementPage from '@/js/pages/Management.vue'
import PermissionsPage from '@/js/pages/Permissions.vue'
import DatabasePublicPage from '@/js/pages/DatabasePublic.vue'
import DatabaseServicePage from '@/js/pages/DatabaseService.vue'
import LoginPage from '@/js/pages/auth/Login.vue'
import AccessNotGrantedPage from '@/js/pages/accesses/AccessNotGranted.vue'
import RegisterPage from '@/js/pages/auth/Register.vue'

Vue.use(Router)

let router = new Router({
    mode: 'history',
    routes: [{
            path: '/login',
            name: 'login',
            component: LoginPage,
            beforeEnter: (to, from, next) => {
                if (store.getters.isLoggedIn) {
                    next({
                        name: "index"
                    });
                }
                next();
            }
        },
        {
            path: '/register',
            name: 'register',
            component: RegisterPage
        },
        {
            path: '/',
            name: 'index',
            component: IndexPage,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/overview',
            name: 'overview',
            component: OverviewPage,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/addresses/:id',
            name: 'address-view',
            component: AddressViewPage,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/addresses/:id/edit',
            name: 'address-edit',
            component: AddressEditPage,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/assignments',
            name: 'assignments',
            component: AssignmentsPage,
            meta: {
                requiresAuth: true,
                isAdmin: true,
            }
        },
        {
            path: '/management',
            name: 'management',
            component: ManagementPage,
            meta: {
                requiresAuth: true,
                isAdmin: true,
            }
        },
        {
            path: '/permissions',
            name: 'permissions',
            component: PermissionsPage,
            meta: {
                requiresAuth: true,
                isAdmin: true,
            }
        },
        {
            path: '/database/public',
            name: 'database-public',
            component: DatabasePublicPage,
            meta: {
                requiresAuth: true,
                isAdmin: true,
            }
        },
        {
            path: '/database/service',
            name: 'database-service',
            component: DatabaseServicePage,
            meta: {
                requiresAuth: true,
                isAdmin: true,
            }
        },
        {
            path: '/401',
            name: 'unauthorized',
            component: AccessNotGrantedPage,
            meta: {
                requiresAuth: true
            }
        }
    ]
});

router.beforeEach((to, from, next) => {
    // protect routes
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.getters.isLoggedIn) {
            next({
                name: 'login',
                params: {
                    nextUrl: to.fullPath
                }
            })
        }
    }
    next();
});

export default router;
