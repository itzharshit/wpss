wp.customize.controlConstructor['bloghash-heading'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this;

		// Change the value
		if ( control.params.toggle ) {
			control.container.on( 'click', '.bloghash-heading-wrapper', function() {
				control.setting.set( ! control.setting.get() );

				var $input  = control.container.find( 'input[type=checkbox]' );
				$input.prop( 'checked', !$input.prop( 'checked' ) );
			});
		}
	}

});