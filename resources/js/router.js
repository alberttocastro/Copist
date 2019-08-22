import Vue from 'vue'
import Router from 'vue-router'

import IndexPage from '@/js/pages/Index.vue'
import OverviewPage from '@/js/pages/Overview.vue'
import AddressViewPage from '@/js/pages/addresses/View.vue'
import AddressEditPage from '@/js/pages/addresses/Edit.vue'
import AssignmentsPage from '@/js/pages/Assignments.vue'
import ManagementPage from '@/js/pages/Management.vue'
import PermissionsPage from '@/js/pages/Permissions.vue'
import DatabasePublic from '@/js/pages/DatabasePublic.vue'
import DatabaseService from '@/js/pages/DatabaseService.vue'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'index',
            component: IndexPage
        },
        {
            path: '/overview',
            name: 'overview',
            component: OverviewPage
        },
        {
            path: '/addresses/:id',
            name: 'address-view',
            component: AddressViewPage
        },
        {
            path: '/addresses/:id/edit',
            name: 'address-edit',
            component: AddressEditPage
        },
        {
            path: '/assignments',
            name: 'assignments',
            component: AssignmentsPage
        },
        {
            path: '/management',
            name: 'management',
            component: ManagementPage
        },
        {
            path: '/permissions',
            name: 'permissions',
            component: PermissionsPage
        },
        {
            path: '/database/public',
            name: 'database-public',
            component: DatabasePublic
        },
        {
            path: '/database/service',
            name: 'database-service',
            component: DatabaseService
        }
    ]
});
