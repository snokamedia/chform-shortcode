<?php
/*
Plugin Name: Snoka Shortcode for CanadaHelps
Plugin URI:  https://github.com/snokamedia/chform-shortcode
Description: A shortcode to embed CanadaHelps' donation form with support for URL parameters.
Version:     1.0.1
Author:      Snoka Media
Author URI:  https://www.snoka.ca/
License:     GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

function chform_query_vars($vars)
{
	$vars = array('amount', 'frequency') + $vars;
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
			'height'   => '1884px',
		),
		$atts,
		'chform'
	);
	// Sanitize atts
	$atts['id'] = absint($atts['id']);
	$atts['language'] = (in_array($atts['language'], array('en', 'fr'), true)) ? $atts['language'] : $lang;
	$atts['height'] = preg_replace('/[^0-9pxemremvhvw%]/', '', $atts['height']);
	// Get URL parameters and sanitize them
	$amount = absint(get_query_var('amount'));
	$monthly = sanitize_text_field(get_query_var('frequency'));
	$val = ($amount > 2) ? '?amount=' . $amount : '';
	$freq = ('monthly' === $monthly) ? '&frequency=monthly' : '';
	// Check for required attributes and valid values
	if (empty($atts['id'])) {
		if (current_user_can('manage_options')) {
			return 'Error: The "id" attribute must be set. Use the page id from the embed code provided by CanadaHelps.';
		} else {
			return '';
		}
	} else {
		// Construct output string using sprintf
		$format = '<script id="ch_cdn_embed" type="text/javascript" src="https://www.canadahelps.org/secure/js/cdf_embed.js"></script> 
				<iframe src="https://www.canadahelps.org/%s/dne/%s%s%s" title="iframe" scrolling="no" style="height: %s; border: 0px none; overflow: hidden;" allow="payment" id="iFrameResizer0" width="100%%"></iframe>';

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
