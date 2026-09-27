// @ts-check
import { defineConfig } from 'astro/config';
import { fileURLToPath } from 'node:url';

export default defineConfig({
  site: 'https://msapd.org',
  output: 'static',
  vite: {
    css: {
      preprocessorOptions: {
        scss: {
          loadPaths: [fileURLToPath(new URL('./src/styles', import.meta.url))],
          // Tokens and mixins available in every component <style lang="scss">
          additionalData: `@use "abstracts" as *;\n`,
        },
      },
    },
  },
});
