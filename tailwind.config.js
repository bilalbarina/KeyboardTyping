/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./Frontend/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        primary: 'black',
      },
      container: {
        center: true,
      },
    },
  },
  plugins: [],
}
