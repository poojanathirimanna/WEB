/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/view/**/*.{html,js,php}",
    "./public/home.php",
    "user/**/*.php",
    "signin/**/*.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}