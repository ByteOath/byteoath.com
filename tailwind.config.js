/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.php',
    './public/**/*.php',
    './public/assets/js/**/*.js',
    './resources/**/*.css',
  ],
  theme: {
    extend: {
      colors: {
        primary:      '#1A2238',
        card:         '#1E2A42',
        accent:       '#00D4FF',
        'accent-dark':'#00A8CC',
        muted:        '#8E9AAF',
      },
      fontFamily: {
        display: ['Montserrat', 'sans-serif'],
        body:    ['Poppins', 'sans-serif'],
        mono:    ['"Fira Code"', '"JetBrains Mono"', 'monospace'],
      },
      maxWidth: {
        content: '760px',
        wide:    '1200px',
      },
    },
  },
  plugins: [],
}

