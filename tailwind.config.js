const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './resources/**/*.blade.php', 
        './vendor/filament/**/*.blade.php', 
        './resources/**/*.antlers.php',
        './resources/**/*.antlers.html'
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
