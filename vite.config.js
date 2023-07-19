import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    resolve:{
        alias:{
            '@':'/resources/js',
            '@Components': '/resources/js/appComponents',
        },
        extensions: ['.js', '.vue', '.json', '.css', '.scss', '.sass']
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        watch: {
            usePolling:false
        }
    }
});
