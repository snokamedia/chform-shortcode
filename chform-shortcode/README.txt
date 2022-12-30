=== Snoka Shortcode for CanadaHelps ===
Contributors: snokamedia
Donate link: https://www.buymeacoffee.com/snoka
Tags: shortcode, canadahelps
Requires at least: 4.7
Tested up to: 6.1.1
Stable tag: 2.0.0
Requires PHP: 5.3
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A plugin that adds a shortcode to embed CanadaHelps donation forms on your WordPress site. With support for URL parameters and automatic language selection, this plugin makes it easy to accept donations from your site visitors.

== Key Features ==
- Embed CanadaHelps donation forms on your site with a shortcode
- Use URL parameters to customize the donation form
- Automatic language selection based on user's locale
- Modal popop for showing the donation form


== Installation ==
1. Download and unzip the plugin
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the shortcode to the pages you want to display the form, using the following format: [chform id=12345]. Replace "12345" with the page id provided by CanadaHelps.

== Shortcode Attributes ==
- **id** (required): The page id from the embed code provided by CanadaHelps.
- **language** (optional): Specify the language of the donation form. Options: "en" for English or "fr" for French. If not specified, the plugin will use the user's locale to determine the language.
- **height** (optional): This attribute allows you to set the height of the CanadaHelps donation form iframe. The default value is "1884px". You can specify a numeric value with a "px", "em", "rem", or "%" suffix. Default: '1760px'
- **modal** (optional): This bool attribute turns the form into and inline modal that opens with button. Options: True or False Default: False 
- **max-width** (optional): Applicable only if the modal attribute is enabled, set the max-width of the modal iframe container div. You can specify a numeric value with a "px", "em", "rem", or "%" suffix. Default: 940px
- **button-text** (optional): Applicable only if the modal attribute is enabled, set the button. Default: 'Donate Now'

### Examples

To specify the French form with an iframe height of 775px, you would use the following attributes:

[chform id=12345 language=fr height=775px]

To specify the modal form with an iframe height of 735px, max-width of 500px, with the button text 'Donate' you would use the following attributes:

[chform id=12345 height=735px max-width=500px modal=true button-text='Donate']

== URL Parameters ==
You can use the following URL parameters to customize the donation form:

- **amount**: The amount that the user will donate. Must be at least 3 (CanadaHelps' minimum).
- **frequency**: The frequency of the donation. Currently, the only option is "monthly".
- **modal**: If set to true will open the modal on page load if the shortcode attribute **modal** is also set to true.

### Example

To automatically open the modal, specify a donation amount of $1000 with a monthly frequency, you would use the following URL parameters:

?amount=1000&frequency=monthly&modal=true

== Troubleshooting ==
If you encounter any issues with the plugin, try the following:

1. Make sure you have entered the correct page id in the shortcode
2. Check the CanadaHelps website to ensure that their service is functioning properly
3. If the issue persists, try deactivating and reactivating the plugin, or contact us for further assistance

== Disclaimer ==
Our plugin relies on a third-party service, CanadaHelps (https://www.canadahelps.org/), for displaying your CanadaHelps forms with our shortcode. By using our plugin, you acknowledge and agree to be bound by the CanadaHelps Terms of Use (https://www.canadahelps.org/en/terms-of-use/) and Privacy Policy (https://www.canadahelps.org/en/privacy-policy/). Please make sure to review these documents before using our plugin.

We are not affiliated with CanadaHelps and are not responsible for their services or any issues that may arise from the use of their services. For any questions or issues related to CanadaHelps, please refer to their website (https://www.canadahelps.org/) or contact them directly.

If you have any questions or concerns about the use of CanadaHelps in our plugin, please do not hesitate to contact us
