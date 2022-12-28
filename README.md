# Snoka Shortcode for CanadaHelps
A plugin that adds a shortcode to embed CanadaHelps donation forms on your WordPress site. With support for URL parameters and automatic language selection, this plugin makes it easy to accept donations from your site visitors.

[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/snoka)
[![ko-fi](https://ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/W7W1FDHVR)

## Key Features
- Embed CanadaHelps donation forms on your site with a shortcode
- Use URL parameters to customize the donation form
- Automatic language selection based on user's locale

## Installation
1. Download and unzip the plugin
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the shortcode to the pages you want to display the form, using the following format: `[chform id=12345]`. Replace "12345" with the page id provided by CanadaHelps.

## Shortcode Attributes
- **id** (required): The page id from the embed code provided by CanadaHelps.
- **language** (optional): Specify the language of the donation form. Options: "en" for English or "fr" for French. If not specified, the plugin will use the user's locale to determine the language.
- **height** (optional): This attribute allows you to set the height of the CanadaHelps donation form iframe. The default value is "1884px". You can specify a numeric value with a "px", "em", "rem", or "%" suffix. Example: `[chform height="775px"]`

## Example
To specify the French form with an iframe height of 775px, you would use the following attributes:

`[chform id=12345 language=fr height=775px]`

## URL Parameters
You can use the following URL parameters to customize the donation form:
- **amount**: The amount that the user will donate. Must be at least 3 (CanadaHelps' minimum).
- **frequency**: The frequency of the donation. Currently, the only option is "monthly".

## Example
To specify a donation amount of $1000 with a monthly frequency, you would use the following URL parameters:

`?amount=1000&frequency=monthly`

## Troubleshooting
If you encounter any issues with the plugin, try the following:
1. Make sure you have entered the correct page id in the shortcode
2. Check the CanadaHelps website to ensure that their service is functioning properly
3. If the issue persists, try deactivating and reactivating the plugin, or contact us for further assistance

## Disclaimer
Our plugin relies on a third-party service, CanadaHelps (https://www.canadahelps.org/), for displaying your CanadaHelps forms with our shortcode. By using our plugin, you acknowledge and agree to be bound by the CanadaHelps Terms of Use (https://www.canadahelps.org/en/terms-of-use/) and Privacy Policy (https://www.canadahelps.org/en/privacy-policy/). Please make sure to review these documents before using our plugin.
We are not affiliated with CanadaHelps and are not responsible for their services or any issues that may arise from the use of their services. For any questions or issues related to CanadaHelps, please refer to their website (https://www.canadahelps.org/) or contact them directly.
If you have any questions or concerns about the use of CanadaHelps in our plugin, please do not hesitate to contact us.
