/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        obscure: '#111111',
        'obscure-darker': '#050505',
        'obscure-light': '#131313',
        'obscure-lighter': '#0d0e0d',
        'obscure-lightest': '#222222',
        emph: '#2563eb',
        'emph-light': '#3b82f6',
        'emph-lighter': '#adc6ff',
        clarity: '#9ca3af',
        'clarity-light': '#a1a1aa',
        'clarity-lighter': '#f3f4f6',
        'clarity-dark': '#52525b',
      },
    },
  },
  plugins: [],
}