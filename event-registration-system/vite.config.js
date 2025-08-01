import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
<<<<<<< HEAD
                'resources/sass/app.scss',
=======
                'resources/css/app.css',
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
