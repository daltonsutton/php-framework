/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/views/**/*.blade.php",
    "./app/views/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'bunker': {
          '50': '#f5f7f8',
          '100': '#dde5ea',
          '200': '#bbc9d4',
          '300': '#92a4b6',
          '400': '#6a8097',
          '500': '#50647c',
          '600': '#3f4e62',
          '700': '#354050',
          '800': '#2d3642',
          '900': '#292f38',
          '950': '#0e1116',
        },
      },
    },
  },
  plugins: [],
}