var Encore = require('@symfony/webpack-encore');
var path = require('path');
Encore
.addAliases({
       'jquery': path.join(__dirname, 'node_modules/jquery/src/jquery')
   })
    // Dossier ou les assets seront compilés
    .setOutputPath('public/build/')
    .autoProvidejQuery()
    .autoProvideVariables({
    $: 'jquery',
    jQuery: 'jquery',
    'window.jQuery': 'jquery',
})
	// chemin public pour accéder au dossier des assets compilés
	// il est conseillé de faire un chemin depuis la racine de votre serveur
	// (d'où le /build) et non un chemin relatif
    .setPublicPath('/basica/public/build')

	// utile uniquement si vous mettez vos fichiers sur un CDN
	// ou si vous voulez deploy autre part que dans le dossier build
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */

	// fichier js principal de l'application
    .addEntry('app', './assets/js/app.js')

	// optionnel
	// fichier js propre à une page en particulier
    //.addEntry('ajax', './assets/js/ajax/ajax.js')

	// optionnel
	// fichier CSS propre à une page en particulier
    .addStyleEntry('custom', './assets/css/custom.css')
    .addStyleEntry('main', './assets/css/main.css')
    .addStyleEntry('Bootstrap', './assets/css/bootstrap.css')


    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use Sass/SCSS files
    //.enableSassLoader()

    // uncomment if you're having problems with a jQuery plugin
    .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
