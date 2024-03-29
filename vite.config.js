import dotenv from 'dotenv'
import { resolve } from 'path'
import { defineConfig } from 'vite'

dotenv.config()
//console.log(process.env.NODE_ENV)

export default defineConfig({
  publicDir: "src/static",
  /*
  base: process.env.NODE_ENV === 'development'
    ? '/'
    : '/dist/',
  */
  build: {
    assetsDir: "",
    manifest: true,
    outDir: `public/wp-content/themes/${process.env.WP_DEFAULT_THEME}/assets`,
    rollupOptions: {
      input: {
        front: 'src/front.js',
      },
    },
  },
  plugins: [
    {
      name: "php",
      handleHotUpdate({file,server})
      {
        if ( file.endsWith('.php') )
        {
          server.hot.send({
            type: "full-reload",
            path: "*"
          })
        }
      }
    }
  ]
})