import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [tailwindcss],
        },
    },
    server: {
        host: '0.0.0.0',  // すべてのIPアドレスでリッスン
        port: 5173,        // ポート番号
        hmr: {
            host: 'localhost',  // HMRのためにローカルホストを指定
        },
    },
});
