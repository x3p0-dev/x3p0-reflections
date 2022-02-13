/**
 * Laravel Mix configuration file.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

// Import required packages.
const mix = require( 'laravel-mix' );

// Sets the development path for assets to the `/resources` folder.
const devPath    = 'resources';
const publicPath = 'public';

// Sets the path to the generated assets to the `/public` folder.
mix.setPublicPath( publicPath );

// Set Laravel Mix options.
mix.options( {
	processCssUrls: false,
	terser: {
		terserOptions: {
			format: { comments: false }
		},
		extractComments: false
	}
} );

// Versioning and cache busting.
mix.version();

// Compile JavaScript.
mix.copy( `${devPath}/js`, `${publicPath}/js` );

// Compile SASS/CSS.
mix.css( `${devPath}/css/style.css`, 'css' )
   .css( `${devPath}/css/blocks/core-audio.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-button.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-buttons.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-code.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-columns.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-cover.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-file.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-gallery.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-group.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-heading.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-image.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-list.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-media-text.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-paragraph.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-post-title.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-pullquote.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-quote.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-separator.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-site-title.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-social-links.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-spacer.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-table.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-verse.css`, 'css/blocks' )
   .css( `${devPath}/css/blocks/core-video.css`, 'css/blocks' );

// Add custom Webpack configuration.
mix.webpackConfig( {
	stats       : 'minimal',
	devtool     : mix.inProduction() ? false : 'source-map',
	performance : { hints : false }
} );
