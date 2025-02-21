import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/bootstrap.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        vue(),
    ],
    server: {
        host: 'devskillstest', // node container in docker (container name)
        origin: 'https://localhost:443', // exposed node container address
    },
    watch: {
        usePolling: true,
    },
});
