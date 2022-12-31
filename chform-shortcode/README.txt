=== Snoka Shortcode for CanadaHelps ===
Contributors: snokamedia
Donate link: https://www.buymeacoffee.com/snoka
Tags: shortcode, canadahelps
Requires at least: 4.7
Tested up to: 6.1.1
Stable tag: 2.0.1
Requires PHP: 7.2
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A plugin that adds a shortcode to embed CanadaHelps donation forms on your WordPress site. With support for URL parameters and automatic language selection, this plugin makes it easy to accept donations from your site visitors.

== Key Features ==
- Embed a form on your WordPress site using the [chform] shortcode.
- Set the language of the form to either English ('en') or French ('fr').
- Customize the form's height and maximum width.
- Display the form in a modal window or as a regular embedded form.
- Pre-fill the form with a donation amount and frequency using URL parameters.

== Installation ==
1. Download and unzip the plugin
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the shortcode to the pages you want to display the form, using the following format: `[chform id=12345]`. Replace "12345" with the page id provided by CanadaHelps.

== Shortcode Attributes ==
- **id** (required): The page id from the embed code provided by CanadaHelps.
- **language** (optional): Specify the language of the donation form. Options: "en" for English or "fr" for French. If not specified, the plugin will use the user's locale to determine the language.
- **height** (optional): The height of the form. Default is '1760px'.
- **modal** (optional): Whether to display the form in a modal window or not. Can be either 'true' or 'false'. Default is 'false'.
- **max-width** (optional): The maximum width of the form. Default is '940px'.
- **button-text** (optional): The text to be displayed on the button. Default is 'Donate Now'.
- **speed** (optional): To set the speed of the animation in the shortcode, use the "speed" attribute and enter a number in milliseconds (1000 = 1 second). The default speed is 300 milliseconds. Example: [shortcode speed="500"]

### Examples

To specify the French form with an iframe height of 775px, you would use the following attributes:

[chform id=12345 language=fr height=775px]

To specify the modal form with an iframe height of 735px, max-width of 500px, with the button text 'Donate' you would use the following attributes:

[chform id=12345 height=735px max-width=500px modal=true button-text='Donate']

== URL Parameters ==

In addition to the shortcode parameters, the form can also be customized using the following URL parameters:
- **amount**: The donation amount to be pre-filled in the form.
- **frequency**: The donation frequency to be pre-selected in the form. Can be either 'one-time' or 'monthly'.
- **modal**: If set to true will open the modal on page load if the shortcode attribute **modal** is also set to true.

### Example

To display a form with the ID 123 in French in a modal window with a pre-filled donation amount of $50 and a pre-selected frequency of monthly:

http://example.com/page-with-form/?amount=50&frequency=monthly&modal=true

### Note

The `modal` URL parameter allows you to open the form in a modal window on page load. To use this parameter, set its value to `true` in the URL.
For example:
http://example.com/page-with-form/?modal=true
Note that this parameter will only have an effect if the `modal` attribute in the shortcode is also set to `true`. If the `modal` shortcode attribute is not set or is set to `false`, the form will not be displayed in a modal window regardless of the value of the `modal` URL parameter.
If the `modal` attribute is set to `true` but the `modal` URL parameter is set to `false`, the form will still be displayed in a modal window when the button is clicked.

== Troubleshooting ==
If you encounter any issues with the plugin, try the following:

1. Make sure you have entered the correct page id in the shortcode
2. Check the CanadaHelps website to ensure that their service is functioning properly
3. If the issue persists, try deactivating and reactivating the plugin, or contact us for further assistance

== Disclaimer ==
This plugin is provided as-is without any guarantees or warranties. Some information is provided in an effort to clarify and provide relevant information for users who may have trouble using the plugin.

Our plugin relies on a third-party service, CanadaHelps (https://www.canadahelps.org/), for displaying your CanadaHelps forms with our shortcode. By using our plugin, you acknowledge and agree to be bound by the CanadaHelps Terms of Use (https://www.canadahelps.org/en/terms-of-use/) and Privacy Policy (https://www.canadahelps.org/en/privacy-policy/). Please make sure to review these documents before using our plugin.
We are not affiliated with CanadaHelps and are not responsible for their services or any issues that may arise from the use of their services. For any questions or issues related to CanadaHelps, please refer to their website (https://www.canadahelps.org/) or contact them directly.
If you have any questions or concerns about the use of CanadaHelps in our plugin, please do not hesitate to contact us

== Upgrade Notice ==

In version 2.0.0, we removed the use of the https://www.canadahelps.org/secure/js/cdf_embed.js script and any functions it provided. If your previous implementation relied on any of these functions, you will need to update your code to work without them. Please note that we cannot guarantee compatibility with any custom scripts or functions that relied on the removed script.
We recommend testing your implementation after upgrading to ensure that it is still functioning as expected. If you encounter any issues, you may need to make additional updates to your code to account for the removal of the script and its functions.
We apologize for any inconvenience this may cause. Thank you for your understanding.

== Changelog ==

A complete changelog of all changes made to the plugin can be found on our [GitHub repository](https://github.com/snokamedia/chform-shortcode/releases).
