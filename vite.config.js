import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/form-validation.js', // Incluir la validacion de formularios para su uso en archivos blade
            ],
            refresh: true,
        }),
    ],
});
