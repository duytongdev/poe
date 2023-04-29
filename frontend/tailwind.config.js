/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

module.exports = {
  content: ['./src/**/*.{html,js,vue}', './src/**/*'],
  theme: {
    extend: {
      fontFamily: {
        // sans: [
        //   'Inter var, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
        //   { fontFeatureSettings: '"cv03", "cv04", "cv11"' }
        // ]
      }
    },
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '2rem'
      }
    },
    colors: {
      primary: colors.indigo,
      light: colors.white,
      dark: colors.slate,
      error: colors.rose,
      success: colors.emerald,
      yellow: colors.yellow
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('tailwind-scrollbar')({ nocompatible: true })
  ],
  variants: {
    scrollbar: ['rounded']
  }
}
