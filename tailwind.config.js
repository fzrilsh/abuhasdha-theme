/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./*.php",
    "./**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        orange: '#FF920F',
        'dark-orange': '#D4480D',
        'dark-gray': '#3A3A3A',
      },
      fontFamily: {
        'plus-jakarta-sans': ['"Plus Jakarta Sans"', 'sans-serif'],
      },
    },
  },
  plugins: [],
}