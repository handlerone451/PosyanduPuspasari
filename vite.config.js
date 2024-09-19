import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            buildDirectory: 'build', // Menentukan folder build
            refresh: true,
        }),
    ],
    server: {
        https: true, // Mengaktifkan HTTPS
    },
});
