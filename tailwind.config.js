module.exports = {
    content: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            screens: {
                "3xl": "1600px",
                "4xl": "1920px",
            },
        },
    },
    plugins: [],
};
