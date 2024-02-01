/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            primary: '#1D5D9B',
            secondary: '#75C2F6',
            third: '#F4D160',
            fourth: '#FBEEAC',
        }
    }
},
  plugins: [],
}

