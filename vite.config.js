import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import vue2 from '@vitejs/plugin-vue2'; 

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js', 
                // 'resources/css/cp.css',  
                // 'resources/js/cp.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
                'app/Forms/Components/**',
            ],
        }),
        vue2(), 
    ],
})
