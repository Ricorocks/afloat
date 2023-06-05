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
                primary: colors.sky,
                success: colors.green,
                warning: colors.yellow,
                brandblue: 'rgb(29, 80, 114)', // #03080b
                brandlightblue: 'rgb(185, 215, 244)', // #b9d7f4
                branddarkblue: 'rgb(6, 16, 23)', // #061017
                // Alternative branddarkblue: 'rgb(5, 20, 55)', // #051437
                // Alternative branddarkblue: 'rgb(3, 8, 11)', // #03080b
                brandgrey: 'rgb(161, 161, 151)', // #a1a197
                brandwhite: 'rgb(247, 247, 243)', // #f7f7f3
                // brandwhite option 245, 245, 245  // #f5f5f5
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
