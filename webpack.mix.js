const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
   ])
   .postCss('node_modules/filepond/dist/filepond.min.css', 'public/css')
   .js('node_modules/filepond/dist/filepond.min.js', 'public/js');

// Ajoutez cette ligne si vous souhaitez versionner les fichiers en production
if (mix.inProduction()) {
    mix.version();
}
