/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        // Estos son los colores que usas en tu HTML
        'obscure-darker': '#050505',
        'obscure-light': '#111111',
        'obscure-lightest': '#222222',
        'emph': '#2563eb', // El azul de tus botones
        'clarity': '#9ca3af',
        'clarity-lighter': '#f3f4f6',
      },
    },
  },
  plugins: [],
}