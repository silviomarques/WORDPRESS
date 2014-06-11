/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	wp.customize( 'countdown[show_logo]', function( value ) {
		value.bind( function( newval ) {
			if(newval)
				$('.logo').show();
			else 
				$('.logo').hide();
		} ); 
		
	} );
	 
	wp.customize( 'countdown[upload_logo]', function( value ) {
		value.bind( function( newval ) {
			if(newval)
				$('.logo img').attr('src',newval);
		} );
	} );
	

} )( jQuery );

