<?php
/*
Plugin Name: Snoka Shortcode for CanadaHelps
Plugin URI:  https://github.com/snokamedia/chform-shortcode
Description: A shortcode to embed CanadaHelps' donation form with support for URL parameters.
Version:     2.0.0
Author:      Snoka Media
Author URI:  https://www.snoka.ca/
License:     GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

function chform_query_vars($vars)
{
	$vars = array('amount', 'frequency', 'modal') + $vars;
	return $vars;
}
add_filter('query_vars', 'chform_query_vars');

function chform_shortcode($atts)
{
	$enarray = array('en_US', 'en_GB', 'en_CA');
	$frarray = array('fr_FR', 'fr_CA', 'fr_BE');

	// Set default language to 'en'
	$lang = 'en';

	// Check current WordPress language setting and assign 'fr' if necessary
	if (in_array(get_locale(), $enarray)) {
		$lang = 'en';
	} elseif (in_array(get_locale(), $frarray)) {
		$lang = 'fr';
	}

	// Set default shortcode attributes
	$atts = shortcode_atts(
		array(
			'id'       => '',
			'language' => $lang,
			'height'   => '1760px',
			'modal'    => false,
			'max-width'   => '940px',
			'button-text' => 'Donate Now',
		),
		$atts,
		'chform'
	);
	// Sanitize atts
	$atts['id'] = intval($atts['id']);
	$atts['language'] = (in_array($atts['language'], array('en', 'fr'), true)) ? $atts['language'] : $lang;
	$atts['height'] = preg_replace('/[^0-9pxemremvhvw%]/', '', $atts['height']);
	$atts['max-width'] = preg_replace('/[^0-9pxemremvhvw%]/', '', $atts['max-width']);
	$atts['button-text'] = sanitize_text_field($atts['button-text']);
	$max_width = esc_attr($atts['max-width']);
	$min_height = esc_attr($atts['height']);
	// This code block retrieves the value of the 'modal' query variable from the URL. It then uses the filter_var function to sanitize the value by converting it to a boolean. If the value is not a valid boolean, it will use the default value of the 'modal' attribute set in the shortcode_atts function. This ensures that the 'modal' attribute is always a boolean value, either from the URL parameter or the default value, and that it is properly sanitized.
	$modal = get_query_var('modal');
	$modal = filter_var($modal, FILTER_VALIDATE_BOOLEAN);
	$atts['modal'] = filter_var($atts['modal'], FILTER_VALIDATE_BOOLEAN);
	// Get URL parameters and sanitize them
	$amount = absint(get_query_var('amount'));
	$monthly = sanitize_text_field(get_query_var('frequency'));

	$val = ($amount > 2) ? '?amount=' . $amount : '';
	$freq = ('monthly' === $monthly) ? '&frequency=monthly' : '';

	// the css
	$modal_vars = array(
		'modal_bg_color' => 'rgba(0, 0, 0, 0.5)',
		'modal_content_bg_color' => '#fff',
		'modal_content_box_shadow' => '0 0 10px rgba(0, 0, 0, 0.5)',
		'modal_content_min_width' => 'unset',
		'modal_close_color' => '#000',
		'modal_close_hover_color' => '#aaa',
		'modal_content_max_width' => $max_width,
		'modal_content_max_height' => $min_height,
	);

	// Allow the variables to be overridden
	$modal_vars = apply_filters('modal_vars', $modal_vars);


	$modal_bg_color = $modal_vars['modal_bg_color'];
	$modal_content_bg_color = $modal_vars['modal_content_bg_color'];
	$modal_content_max_width = $modal_vars['modal_content_max_width'];
	$modal_content_max_height = $modal_vars['modal_content_max_height'];
	$modal_close_hover_color = $modal_vars['modal_close_hover_color'];
	$modal_close_color = $modal_vars['modal_close_color'];
	$modal_content_min_width = $modal_vars['modal_content_min_width'];
	$modal_content_box_shadow = $modal_vars['modal_content_box_shadow'];



	$css = "
	  .chform-modal {
		display: none;
		position: fixed;
		z-index: 1000;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: {$modal_bg_color};
		transition: all 0.2s ease-in-out;
	  }
	  .chform-modal.is-open {
		display: block;
		transition: all 0.2s ease-in-out;
	  }
	  .chform-modal-content {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		background-color: {$modal_content_bg_color};
		box-shadow: {$modal_content_box_shadow};
		max-height: 90%;
		overflow-y: auto;
		transition: all 0.3s ease;
		padding: 20px;
		min-width: {$modal_content_min_width};
		width: 100%;
	  }
	  .chform-modal-close {
		z-index: 1001;
		position: fixed;
		right: 10px;
		top: 10px;
		float: none;
		font-size: 28px;
		font-weight: bold;
		color: {$modal_close_color};
		cursor: pointer;
		transition: all 0.3s ease;
	  }
	  .chform-modal-close:hover {
		color: {$modal_close_hover_color};
	  }
	  @media (max-width: 768px) {
		.chform-modal-content {
		  top: 10%;
		  left: 0;
		  transform: none;
		  max-width: 100%;
		  max-height: $modal_content_max_height
		}
	  }
	  @media screen and (max-width: 480px) {
		.chform-modal-content {
		  top: 10%;
		  left: 0;
		  transform: none;
		  width: 100%;
		  height: 100%;
		  min-width: 100%;
		}
	  }
	  @media (min-width: 940px) {
		.chform-modal-content {
		  max-width: {$modal_content_max_width};
		}
	  }";

	// Check for required attributes and valid values
	if (empty($atts['id'])) {
		if (current_user_can('manage_options')) {
			return 'Error: The "id" attribute must be set. Use the page id from the embed code provided by CanadaHelps.';
		} else {
			return '';
		}
	}
	if ($atts['modal']) {

		if (!wp_script_is('chform-modal-script', 'registered')) {
			wp_register_script('chform-modal-script', plugin_dir_url(__FILE__) . 'js/chform-modal.js', array(), '1.0.0', true);
		}
		$css = preg_replace('/\s+/', '', $css);
		$output = "<style>$css</style>";
		wp_enqueue_script('chform-modal-script');

		wp_localize_script('chform-modal-script', 'chformModalData', array(
			'ajaxUrl' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('chform_modal_nonce'),
		));
		// Construct output string using sprintf
		$format = '
		<button id="chform-modal-button" class="chform-modal-button">%s</button>
				<div id="chform-modal" class="chform-modal">
				<button class="chform-modal-close">&times;</button>
					<div class="chform-modal-content">


						<iframe src="https://www.canadahelps.org/%s/dne/%s%s%s" title="iframe" scrolling="no" style="height: %s; border: 0px none; overflow: hidden;" allow="payment" id="iFrameResizer0" width="100%%"></iframe>
					</div>
				</div>';

		$output .= vsprintf($format, array(
			esc_attr($atts['button-text']),
			esc_attr($atts['language']),
			esc_html($atts['id']),
			esc_html($val),
			esc_html($freq),
			esc_attr($atts['height']),
		));
		$output = wp_kses($output, array(
			'button' => array(
				'id' => true,
				'class' => true,
			),
			'div' => array(
				'id' => true,
				'class' => true,
				'style' => array(),
			),
			'script' => array(
				'id' => true,
				'type' => true,
				'src' => true,
			),
			'iframe' => array(
				'src' => true,
				'title' => true,
				'scrolling' => true,
				'style' => true,
				'allow' => true,
				'id' => true,
				'width' => true,
			),
			'style' => array(
				'class' => array(),
				'display' => array(),
				'position' => array(),
				'z-index' => array(),
				'left' => array(),
				'top' => array(),
				'width' => array(),
				'height' => array(),
				'overflow' => array(),
				'background-color' => array(),
				'transition' => array(),
			),
			'@media' => array(
				'screen' => array(),
				'max-width' => array(),
				'min-width' => array(),
			),
		));
		return "\n" . $output . "\n";
		if ($modal) {
			document . getElementById('chform-modal') . classList . add('is-open');
		}
	} else {
		$format = '<iframe src="https://www.canadahelps.org/%s/dne/%s%s%s" title="iframe" scrolling="no" style="height: %s; border: 0px none; overflow: hidden;" allow="payment" id="iFrameResizer0" width="100%%"></iframe>';

		$output = vsprintf($format, array(
			esc_attr($atts['language']),
			esc_html($atts['id']),
			esc_html($val),
			esc_html($freq),
			esc_attr($atts['height']),
		));
		// Sanitize the output string using wp_kses()
		$output = wp_kses($output, array(
			'script' => array(
				'id' => true,
				'type' => true,
				'src' => true,
			),
			'iframe' => array(
				'src' => true,
				'title' => true,
				'scrolling' => true,
				'style' => true,
				'allow' => true,
				'id' => true,
				'width' => true,
			),
		));
		$output = apply_filters('chform_shortcode_output', $output);
		return "\n" . $output . "\n";
	}
}
add_shortcode('chform', 'chform_shortcode', 10, 2);
