import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vite.dev/config/
export default defineConfig({
  plugins: [react()],
  server: {
    host: '0.0.0.0', // Dockerコンテナ外からのアクセスを許可
    port: 3000,
    watch: {
      usePolling: true, // Windows/Macでのファイル変更検知を安定させる
    },
  },
})