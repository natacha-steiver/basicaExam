/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');



require('../css/main.css');
require('../css/custom.css');
require('../css/bootstrap.css');
require('../css/bootstrap.min.css');
require('../css/icomoon-social.css');
require('../css/font-awesome.min.css');


require('../../node_modules/jquery.easing/jquery.easing.js');


// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// require jQuery normally
var jQuery = require('jQuery');

//require('jquery.easing')(jQuery);

 // create global $ and jQuery variables
global.$ = global.jQuery = $;

//require('jquery.easing')(jQuery);
//

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
require('./ajax.js');
require('./bootstrap.js');
require('./bootstrap.min.js');

//require('./modernizr-2.6.2-respond-1.1.0.min.js');
require('./scrolling-nav.js');
require('./ajax.js');
