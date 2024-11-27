import { defineConfig } from 'vite';
import checker from "vite-plugin-checker";
import viteDrupalTemplateHMR from "vite-plugin-drupal-template-hmr"

export default defineConfig({
  base: '/themes/custom/default/dist',
  plugins: [
    checker({
      stylelint: {
        lintCommand: 'stylelint **/*.{scss,css}',
      },
      eslint: {
        lintCommand: 'eslint "./src/**/*.{js,ts}"',
        dev: {
          logLevel: ['error', 'warning'],
        }
      },
      typescript: true
    }),
    viteDrupalTemplateHMR({
      templateBase: 'themes/custom/default/',
    }),
  ],
  server: {
    host: '0.0.0.0',
    origin: 'https://theme-' + process.env.APP_DOMAIN,
    port: 5173,
    strictPort: true,
    hmr: {
      clientPort: 443,
    },
  },
  build: {
    manifest: true,
    minify: true,
    assetsInlineLimit: 0,
    rollupOptions: {
      input: {
        main: './src/main.ts',
      },
      output: {
        entryFileNames: 'assets/[name].js',
        assetFileNames: 'assets/[name][extname]',
      },
    },
  },
});
