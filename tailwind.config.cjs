const rtl = require('tailwindcss-rtl');
const typo = require('@tailwindcss/typography');
const forms = require('@tailwindcss/forms');

module.exports = {
    content: ['./resources/**/*.blade.php', './resources/**/*.js', './resources/**/*.ts', './resources/**/*.vue'],
    theme: {
        extend: {},
    },
    plugins: [rtl, typo, forms],
};
