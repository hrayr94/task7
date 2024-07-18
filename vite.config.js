import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Specify your input files
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            // Optionally enable refresh for hot module replacement
            refresh: true,
            // Additional configurations as needed
        }),
    ],
    // Other Vite configuration options
});
