<?php
/**
 * Shortcodes
 */

namespace SimplePay\Core;

use SimplePay\Core\Abstracts\Form;
use SimplePay\Core\Forms\Default_Form;
use SimplePay\Core\Payments\Payment;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcodes.
 *
 * Register and handle custom shortcodes.
 */
class Shortcodes {

	/**
	 * Constructor
	 */
	public function __construct() {

		// Add shortcodes.
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Register shortcodes.
	 */
	public function register() {

		add_shortcode( 'simpay', array( $this, 'print_form' ) );

		add_shortcode( 'simpay_payment_receipt', array( $this, 'print_payment_receipt' ) );

		add_shortcode( 'simpay_preview', array( $this, 'print_preview_form' ) );

		add_shortcode( 'simpay_error', array( $this, 'print_errors' ) );

		do_action( 'simpay_add_shortcodes' );
	}

	/**
	 * Error message shortcode
	 *
	 * @param $attributes
	 *
	 * @return string
	 */
	public function print_errors( $attributes ) {

		$args = shortcode_atts( array(
			'show_to' => 'admin',
		), $attributes );

		$access_level = strtolower( $args['show_to'] );

		$show = false;

		switch ( $access_level ) {
			case 'registered':
				if ( is_user_logged_in() ) {
					$show = true;
				}
				break;
			case 'all':
				$show = true;
				break;
			default:
				// Admin is the default access level
				if ( current_user_can( 'manage_options' ) ) {
					$show = true;
				}
				break;
		}

		if ( $show ) {
			if ( Session::has_errors() ) {
				return '<div class="simpay-error">' . Session::print_all_errors() . '</div>';
			}
		}

		return '';
	}

	/**
	 * Print a form.
	 *
	 * @since  3.0.0
	 *
	 * @param  array $attributes
	 *
	 * @return string
	 */
	public function print_form( $attributes ) {

		global $simpay_form;

		Session::clear_all();

		$args = shortcode_atts( array(
			'id' => null,
		), $attributes );

		$id = absint( $args['id'] );

		if ( $id > 0 ) {

			$form_post = get_post( $id );

			if ( $form_post && 'publish' === $form_post->post_status ) {

				$simpay_form = apply_filters( 'simpay_form_view', new Default_Form( $id ), $id );

				if ( $simpay_form instanceof Form ) {

					ob_start();

					$simpay_form->html();

					return ob_get_clean();
				}
			}
		}

		return '';
	}

	/**
	 * Shortcode to show preview output
	 *
	 * @param $attributes
	 *
	 * @return string
	 */
	public function print_preview_form( $attributes ) {

		global $simpay_form;

		$args = shortcode_atts( array(
			'id' => null,
		), $attributes );

		$id = absint( $args['id'] );

		if ( $id > 0 ) {

			$form_post = get_post( $id );

			if ( $form_post && current_user_can( 'manage_options' ) ) {

				$simpay_form = apply_filters( 'simpay_form_view', new Default_Form( $id ), $id );

				if ( $simpay_form instanceof Form ) {

					ob_start();

					$simpay_form->html();

					return ob_get_clean();
				}
			}
		}

		return '';
	}

	/**
	 * Shortcode to print the payment details
	 *
	 * @return Payments\Details|string
	 */
	public function print_payment_receipt() {

		$charge_id       = Session::get( 'charge_id' );
		$customer_id     = Session::get( 'customer_id' );

		if ( empty( $charge_id ) ) {
			echo '<p>' . esc_html__( 'An error occurred, but your charge may have went through. Please contact the site admin.', 'stripe' ) . '</p>';

			return '';
		}

		global $simpay_form;

		$simpay_form = Session::get( 'simpay_form' );

		if ( ! ( $simpay_form instanceof Form ) ) {
			return '';
		}

		$payment = new Payment( $simpay_form );

		$payment->set_charge( $charge_id );

		if ( $customer_id ) {
			$payment->set_customer( $customer_id );
		}

		$html = new Payments\Details( $payment );

		$html = $html->html( false );

		return $html;
	}
}
