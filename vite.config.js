import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

import livewire from '@defstudio/vite-livewire-plugin'; // Here we import it

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        
       livewire({  // Here we add it to the plugins
           refresh: ['resources/css/app.css'],
       }),
    ],
});