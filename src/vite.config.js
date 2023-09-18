import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
// const path = require('path')

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost',
        }
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/login.css",
                "resources/js/app.js"
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ]
});
