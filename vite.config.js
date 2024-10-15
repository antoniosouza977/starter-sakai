import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { fileURLToPath, URL } from 'node:url';
import { PrimeVueResolver } from '@primevue/auto-import-resolver';
import Components from 'unplugin-vue-components/vite';

export default defineConfig({
    server: {
        host: true,
        port: parseInt(process.env.VITE_HMR_PORT || '5173', 10),
        strictPort: true,
        watch: {
            usePolling: true,
        },
        hmr: {
            host: process.env.VITE_HMR_HOST || 'localhost',
            port: parseInt(process.env.VITE_HMR_PORT || '5173', 10),
        },
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        Components({
            resolvers: [PrimeVueResolver()]
        })
    ],
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./resources/js/', import.meta.url))
        }
    }
});
