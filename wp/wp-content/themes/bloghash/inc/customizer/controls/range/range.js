;( function( $ ) {

 	'use strict';

 	wp.customize.controlConstructor['bloghash-range'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this,
				setting = control.setting.get();

			// Initialize range control.
			control.container.find( '.bloghash-range-wrapper' ).rangeControl({
				id: control.params.id,
				unit: control.params.unit,
				value: setting,
				responsive: control.params.responsive,
				change: function() {
					control.save();
				}
			});

		},

		/**
		 * Store value for range control.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 *
		 * @returns {void}
		 */
		save: function() {

			var value = {},
				devices = this.params.responsive;

			if ( false === devices || devices === undefined || 0 == devices.length ) {
				value.value = parseFloat( this.container.find( '.bloghash-range-input' ).val() );
			} else {
				for ( var device in devices ) {
					value[ device ] = parseFloat( this.container.find( '.control-responsive.' + device + ' .bloghash-range-input' ).val() );
				}
			}

			if ( this.container.find( '.bloghash-control-unit' ).length ) {
				value.unit = this.container.find( '.bloghash-control-unit input:checked' ).val();
			}

			this.setting.set( value );
		}
	});

	( function( $, undef ) {

		var RangeControl;

		/**
		 * Range control that is used in the theme customizer.
		 *
		 * @since 1.0.0
		 */
		RangeControl = {

			options: {
				id: false,
				option: false,
				responsive: false,
				unit: false,
				value: false,
				change: false
			},

			/**
			 * Creates the range control.
			 *
			 * @since 1.0.0
			 *
			 * @access private
			 *
			 * @returns {void}
			 */
			_create: function() {

				var self = this,
					el = self.element;

				self.unit = el.find( '.bloghash-control-wrap' ).attr( 'data-unit' );

				self._addListeners();

				if ( 'object' === typeof self.options.responsive ) {
					self._initResponsiveControls();
				}

				if ( false !== self.options.unit ) {
					self._initUnit();
				}
			},

			/**
			 * Binds event listeners to the color picker.
			 *
			 * @since 1.0.0
			 *
			 * @access private
			 *
			 * @returns {void}
			 */
			_addListeners: function() {

				var self = this,
					range,
					input,
					value,
					newVal;

				/**
				 * Detect changes on range element.
				 *
				 * @since 1.0.0
				 */
				self.element.change( function( event ) {

					// Fire clear callback if we have one.
					if ( $.isFunction( self.options.change ) ) {
						self.options.change.call( this, event );
					}
				});

				/**
				 * Detect typing on range text input.
				 *
				 * @since 1.0.0
				 */
				self.element.on( 'keyup input paste', '.bloghash-range-input', function() {
					self._autocorrectSlider( $( this ) );
				}).on( 'focusout', function() {
					self._autocorrectSlider( $( this ) );
				});

				/**
				 * Detect slider click.
				 *
				 * @since 1.0.0
				 */
				self.element.on( 'click', 'input[type=range]', function() {

					range = $( this );
					input = range.parent().children( '.bloghash-range-input' );

					newVal = range.val();

					if ( value !== newVal ) {
						value = newVal;
						input.val( newVal ).change();
					}
				});

				/**
				 * Detect slider dragging.
				 *
				 * @since 1.0.0
				 */
				self.element.on( 'mousedown', 'input[type=range]', function() {

					range = $( this );
					input = range.parent().children( '.bloghash-range-input' );

					// Handle mousemove.
					range.mousemove( function() {
						newVal = range.val();
						if ( value !== newVal ) {
							value = newVal;
							input.val( newVal ).change();
						}
					});
				});

				/**
				 * Slider dragging gone.
				 *
				 * @since 1.0.0
				 */
				self.element.on( 'mouseup', 'input[type=range]', function() {
					$( this ).off( 'mousemove' );
				});

				/**
				 * Reset default values.
				 *
				 * @since 1.0.0
				 */
				self.element.on( 'click', '.bloghash-reset-range', function() {

					var $el;

					self.element.find( '.bloghash-reset-range' ).each( function( index, el ) {

						$el = $( el );

						// Reset range unit.
						self.unit = $el.data( 'reset_unit' );
						$el.closest( '.bloghash-range-wrapper' ).find( '.bloghash-control-unit input[type="radio"][value="' + $el.data( 'reset_unit' ) + '"]' ).click();

						// Reset range value.
						$el.siblings( 'input' ).val( $el.data( 'reset_value' ) );
					});

					self.element.change();
				});


				/**
				 * Adjust min, max and step for unit.
				 *
				 * @since 1.0.0
				 */
				self.element.on( 'click', '.bloghash-control-unit input', function() {

					var $unit = $( this );

					self.element.find( '.bloghash-control-wrap input[type="range"]' ).each( function( index, el ) {
						$( this ).attr( 'min', $unit.data( 'min' ) );
						$( this ).attr( 'max', $unit.data( 'max' ) );
						$( this ).attr( 'step', $unit.data( 'step' ) );
					});
					if ( 'px' === $unit.val() && ( 'rem' === self.unit || 'em' === self.unit ) ) {

						self.element.find( 'input.bloghash-range-input' ).each( function( index, el ) {
							$( el ).val( Math.floor( $( el ).val() * range_obj.base_font ) );
							self._autocorrectSlider( $( el ) );
						});

						self.unit = $unit.val();

					} else if ( ( 'rem' === $unit.val() || 'em' === $unit.val() ) && 'px' === self.unit ) {

						self.element.find( 'input.bloghash-range-input' ).each( function( index, el ) {
							$( el ).val( $( el ).val() / range_obj.base_font );
							self._autocorrectSlider( $( el ) );
						});

						self.unit = $unit.val();
					}
				});
			},

			/**
			 * Autocorrect position on slider to match value in input.
			 *
			 * @since 1.0.0
			 *
			 * @access private
			 *
			 * @returns {void}
			 */
			_autocorrectSlider: function( range_input ) {

				var range = range_input.parent().find( 'input[type="range"]' ),
					value = parseFloat( range_input.val() ),
					step  = parseFloat( range_input.attr( 'step' ) ),
					min   = parseFloat( range_input.attr( 'min' ) ),
					max   = parseFloat( range_input.attr( 'max' ) );

				if ( isNaN( value ) ) {
					range.change();
					return;
				}

				if ( 1 <= step && 0 !== value % 1 ) {
					value = Math.round( value );
					range_input.val( value );
					range.val( value ).change();
				}

				if ( value > max ) {
					range_input.val( max );
					range.val( max ).change();
				}

				if ( value < min ) {
					range_input.val( min );
					range.val( min ).change();
				}

				range.val( value ).change();
			},

			/**
			 * Initialize responsive controls for range.
			 *
			 * @since 1.0.0
			 *
			 * @access private
			 *
			 * @returns {void}
			 */
			_initResponsiveControls: function() {

				var self = this,
					el = self.element,
					wrap = el.find( '.bloghash-control-wrap' );

				el.addClass( 'bloghash-control-responsive' );

				// Populate responsive switcher.
				if ( el.find( '.customize-control-title' ).length ) {

					var $switcher = $( '<ul class="bloghash-responsive-switchers"></ul>' );

					for ( var device in self.options.responsive ) {
						$switcher.append( '<li class="' + device + '"><span class="preview-' + device + '" data-device="' + device + '"><span class="bloghash-tooltip small-tooltip">' + device + '</span><i class="' + self.options.responsive[device].icon + '"></i></span></li>' );
					}

					el.find( '.customize-control-title' ).append( $switcher );
				}
			},

			/**
			 * Initialize unit controls for range.
			 *
			 * @since 1.0.0
			 *
			 * @access private
			 *
			 * @returns {void}
			 */
			_initUnit: function() {

				var self = this,
					el = self.element,
					wrap = el.find( '.bloghash-control-wrap' );

				var template = wp.template( 'bloghash-control-unit' );

				var data = {
					unit: self.options.unit,
					id: self.options.id,
					option: self.options.option,
					selected: wrap.attr( 'data-unit' )
				};

				if ( 'object' === typeof self.options.unit ) {
					$( template( data ) ).insertBefore( wrap );

					if ( 'undefined' !== typeof self.options.value.unit ) {
						wrap.parent().find( '#' + self.options.id + '-' + self.options.value.unit + '-unit' ).click();
					}

				} else if ( 'string' === typeof self.options.unit ) {
					$( '<span class="bloghash-range-unit">' + self.options.unit + '</span>' ).insertAfter( wrap.find( '.bloghash-range-input' ) );
				}

				wrap.parent().find( '.bloghash-control-unit input:checked' ).click();
			}
		};

		// Register the color picker as a widget.
		$.widget( 'bloghash.rangeControl', RangeControl );
	}( jQuery ) );

}( jQuery ) );
