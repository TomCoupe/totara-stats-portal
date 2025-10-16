import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig({
    plugins: [vue()],
    build: {
        outDir: 'public/assets',
        emptyOutDir: true,
        manifest: true,
        rollupOptions: { input: 'resources/js/app.js' }
    },
    allowedHosts: [
        'http://kindly-peaceful-shrew.ngrok-free.app/',
        'https://kindly-peaceful-shrew.ngrok-free.app/',
        'kindly-peaceful-shrew.ngrok-free.app'
    ],
    resolve: { alias: { '@': path.resolve(__dirname, 'resources/js') } },
    server: { port: 5173, strictPort: true }
})