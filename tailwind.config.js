/** @type {import('tailwindcss').Config} */
import dotenv from 'dotenv'
import { resolve } from 'path'
import defaultTheme from 'tailwindcss/defaultTheme';

dotenv.config()

export default {
  darkMode: 'class',
  content: [
    "./index.html",
    "./src/**/*.{html,js}",
    `public/wp-content/themes/${process.env.WP_DEFAULT_THEME}/**/*.{php,html,js}`,
  ],
  theme: {
    extend: {
      colors:{
        accent: '#25255D',
        primary: '#333FCF',
        fb: '#3b5998',
        tw: '#55acee',
        wa: '#00e676'
      },
      fontFamily: {
          sans: ['Poppins', ...defaultTheme.fontFamily.sans],
      },
      /*
      fontSize:{
          'xxs': '.625rem',
      },
      lineHeight: {
          11: '2.75rem'
      },
      */
      transitionProperty: {
          'position': 'top, right, bottom, left',
          'size': 'width, height, min-width, min-height, max-width, max-height',
      }
    },
  },
  plugins: ['tailwindcss/forms'],
}

