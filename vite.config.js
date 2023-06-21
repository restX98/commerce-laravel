import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/css/header.css',
                'resources/css/category.css',
                'resources/css/product.css',
                'resources/css/register.css',
                'resources/css/login.css',
            ],
            refresh: true,
        }),
    ],
});
