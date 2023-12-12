import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/general.css',
                'resources/css/home.css',
                'resources/css/products.css',
                'resources/css/categories.css',
                'resources/js/categories.js',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/products.js',
            ],
            refresh: true,
        }),
    ],
});
