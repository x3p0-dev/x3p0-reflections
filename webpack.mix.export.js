/**
 * Laravel Mix config file for exporting clean project folder.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

// Import required packages.
const mix    = require( 'laravel-mix' );
const rimraf = require( 'rimraf' );
const fs     = require( 'fs' );

// Folder name to export the files to.
let exportPath = `${process.env.npm_package_name}`;

// Root-level files to include.
let files = [
	'changelog.md',
	'functions.php',
	'index.php',
	'license.md',
	'readme.md',
	'readme.txt',
	'screenshot.png',
	'style.css',
	'theme.json'
];

// Folders to include.
let folders = [
	'parts',
	'patterns',
	'public',
	'resources',
	'src',
	'templates',
	'vendor'
];

// Files and folders to delete.
let deleteFiles = [
	'mix-manifest.json',
	`${exportPath}/vendor/bin`,
	`${exportPath}/vendor/composer/installers`
];

// Delete the previous export to start clean.
rimraf.sync( exportPath );

// Copy files to export folder.
mix.copy( files, exportPath );

// Loop through the folders and copy them to export folder.
folders.forEach( folder => {
	mix.copyDirectory( folder, `${exportPath}/${folder}` );
} );

// Delete unneeded files and folders.
mix.then( () => {
	deleteFiles.forEach( file => {
		if ( fs.existsSync( file ) ) {
			rimraf.sync( file );
		}
	} );
} );
