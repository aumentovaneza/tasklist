module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/components/*.vue',
    ],
  darkMode: false, // or 'media' or 'class'
  theme: {
      extend: {
          colors: {
              accolade : {
                  blue:'#1582BF',
                  darkblue : '#373771',
                  lightblue : '#1583C0',
                  powderblue: '#8BC3E2',
                  lightbluegray : '#F1F5FB',
                  indigo : '#363772',
                  gray : '#F6F6F6',
                  lightgray: '#DFDFDF',
                  darkgray : '#9b9b9b',
                  red : '#BD0237',
                  orange : '#BD2B02',
                  yellow : '#BD8802',
                  green : '#28C26D'
              }
          }
      },
  },
  variants: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
}
