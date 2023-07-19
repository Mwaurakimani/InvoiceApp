import './bootstrap';
import '../css/app.css';
import '../scss/defaults.scss';

import {createApp, h} from 'vue';
import {createInertiaApp, Link} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
import {app_defaults} from "@/appDefaults/config.js";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),

    setup({el, App, props, plugin}) {
        const VueApplication = createApp({render: () => h(App, props)})

        VueApplication.config.globalProperties.app_defaults = app_defaults

        VueApplication.mixin({
            components:{
                Link,
                DashboardLayout
            }
        })

        VueApplication
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el)

        return VueApplication
    },
    progress: {
        color: '#297cef',
    },
});
