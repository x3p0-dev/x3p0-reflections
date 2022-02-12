wp.domReady( () => {
	// Unregister core block styles.
	wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
	wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );
} );
