module.exports = {
  purge: ['./public/**/*.html'],
  darkMode: 'media', // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        light: 'var(--light)',
        dark: 'var(--dark)',
        darker: 'var(--darker)',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
