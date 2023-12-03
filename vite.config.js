import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/posts.scss',
                'resources/sass/post.scss',
                'resources/sass/editor.scss',
                'resources/sass/activityShow.scss',
                'resources/js/editor.js',
                'resources/js/app.js',
                'resources/js/activityForm.js'
            ],
            refresh: true,
        }),
    ],
});
