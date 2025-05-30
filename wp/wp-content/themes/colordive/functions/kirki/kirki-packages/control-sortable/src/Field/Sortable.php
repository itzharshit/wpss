<?php
/**
 * Override field methods
 *
 * @package   kirki-framework/control-sortable
 * @copyright Copyright (c) 2023, Themeum
 * @license   https://opensource.org/licenses/MIT
 * @since     1.0
 */

namespace Kirki\Field;

use Kirki\Field;

/**
 * Field overrides.
 *
 * @since 1.0
 */
class Sortable extends Field {

	/**
	 * The field type.
	 *
	 * @access public
	 * @since 1.0
	 * @var string
	 */
	public $type = 'kirki-sortable';

	/**
	 * The control class-name.
	 *
	 * @access protected
	 * @since 0.1
	 * @var string
	 */
	protected $control_class = '\Kirki\Control\Sortable';

	/**
	 * Whether we should register the control class for JS-templating or not.
	 *
	 * @access protected
	 * @since 0.1
	 * @var bool
	 */
	protected $control_has_js_template = true;

	/**
	 * Filter arguments before creating the setting.
	 *
	 * @access public
	 * @since 0.1
	 * @param array                $args         The field arguments.
	 * @param WP_Customize_Manager $wp_customize The customizer instance.
	 * @return array
	 */
	public function filter_setting_args( $args, $wp_customize ) {
		if ( $args['settings'] === $this->args['settings'] ) {
			$args = parent::filter_setting_args( $args, $wp_customize );

			// Set the sanitize-callback if none is defined.
			if ( ! isset( $args['sanitize_callback'] ) || ! $args['sanitize_callback'] ) {
				$args['sanitize_callback'] = [ $this, 'sanitize' ];
			}
		}
		return $args;
	}

	/**
	 * Filter arguments before creating the control.
	 *
	 * @access public
	 * @since 0.1
	 * @param array                $args         The field arguments.
	 * @param WP_Customize_Manager $wp_customize The customizer instance.
	 * @return array
	 */
	public function filter_control_args( $args, $wp_customize ) {
		if ( $args['settings'] === $this->args['settings'] ) {
			$args         = parent::filter_control_args( $args, $wp_customize );
			$args['type'] = 'kirki-sortable';
		}
		return $args;
	}

	/**
	 * Sanitizes sortable values.
	 *
	 * @static
	 * @access public
	 * @since 1.0
	 * @param array $value The checkbox value.
	 * @return array
	 */
	public function sanitize( $value = [] ) {
		$value = (array) $value;

		foreach ( $value as $key => $sub_value ) {
			$value[ $key ] = sanitize_text_field( $sub_value );
		}
		return $value;
	}
}
