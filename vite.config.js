import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
import path from 'path';

const tsFiles = fs
    .readdirSync(path.resolve(__dirname, 'resources/ts/pages'))
    .filter(file => file.endsWith('.ts'))
    .map(file => `resources/ts/pages/${file}`);

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/ts/app.ts',
                ...tsFiles
            ],
            refresh: true,
        }),
    ],
});
