/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {        
      colors: {
      favocrew_black: '#202020',
      favocrew_red: '#690d05',
      favocrew_darkgrey: '#7F7B82',
      favocrew_grey: '#BFACB5',
      favocrew_lightgrey: '#E5D0CC',
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}