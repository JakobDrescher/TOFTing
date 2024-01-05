/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './public/**/*.html',
    './src/**/*.{js,jsx,ts,tsx,vue}',
  ],
  mode: 'jit',
  purge: {
    content: [
      './index.html',
      './src/**/*.{vue,js,ts,jsx,tsx}',
    ],
  },
  theme: {
    extend: {
      fontFamily: {
        'alegreya-sans-sc': ['Alegreya Sans SC', 'sans-serif'],
        'alegreya-sans-sc-bold': ['Alegreya Sans SC Bold', 'sans-serif'],
        'alegreya-sans-sc-extrabold': ['Alegreya Sans SC Extrabold', 'sans-serif'],
      },
      fontSize: {
        'xxs': '.75rem', // Adjust the size as needed
      },
    },
  },
  plugins: [],
}