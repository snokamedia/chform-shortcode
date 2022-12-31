# Snoka Shortcode for CanadaHelps

Snoka Media's CanadaHelps donation shortcode plugin allows you to easily embed CanadaHelps donation forms on your WordPress site with support for URL parameters and automatic language selection. Display the form as a modal or embedded, and pre-fill the form with donation details using URL parameters.

[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/snoka)
[![ko-fi](https://ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/W7W1FDHVR)

## Key Features
- Embed a form on your WordPress site using the [chform] shortcode.
- Set the language of the form to either English ('en') or French ('fr').
- Customize the form's height and maximum width.
- Display the form in a modal window or as a regular embedded form.
- Pre-fill the form with a donation amount and frequency using URL parameters.
- Set the speed of the open/close animation.


## Installation
1. Download and unzip the plugin
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the shortcode to the pages you want to display the form, using the following format: `[chform id=12345]`. Replace "12345" with the page id provided by CanadaHelps.

## Shortcode Attributes
- **id** (required): The page id from the embed code provided by CanadaHelps.
- **language** (optional): Specify the language of the donation form. Options: "en" for English or "fr" for French. If not specified, the plugin will use the user's locale to determine the language.
- **height** (optional): The height of the form. Default is '1760px'.
- **modal** (optional): Whether to display the form in a modal window or not. Can be either 'true' or 'false'. Default is 'false'.
- **max-width** (optional): The maximum width of the form. Default is '940px'.
- **button-text** (optional): The text to be displayed on the button. Default is 'Donate Now'.
- **speed** (optional): To set the speed of the open/close animation in the shortcode, use the "speed" attribute and enter a number in milliseconds (1000 = 1 second). The default speed is 300 milliseconds.

## Examples
To specify the French form with an iframe height of 775px, you would use the following attributes:
```
[chform id=12345 language=fr height=775px]
```
To specify the modal form with an iframe height of 735px, max-width of 500px, speed of 125 milliseconds, with the button text 'Donate' you would use the following attributes:

```
[chform id=12345 height=735px max-width=500px modal=true speed=125 button-text='Donate']
```
## URL Parameters
In addition to the shortcode parameters, the form can also be customized using the following URL parameters:

- **amount**: The donation amount to be pre-filled in the form.
- **frequency**: The donation frequency to be pre-selected in the form. Can be either 'one-time' or 'monthly'.
- **modal**: If set to true will open the modal on page load if the shortcode attribute **modal** is also set to true.

Example
To display a form with the ID 123 in French in a modal window with a pre-filled donation amount of $50 and a pre-selected frequency of monthly:

```
http://example.com/page-with-form/?amount=50&frequency=monthly&modal=true
```

## Modal URL Parameter

The `modal` URL parameter allows you to open the form in a modal window on page load. To use this parameter, set its value to `true` in the URL.

For example:

```
http://example.com/page-with-form/?modal=true
```
Note that this parameter will only have an effect if the `modal` attribute in the shortcode is also set to `true`. If the `modal` shortcode attribute is not set or is set to `false`, the form will not be displayed in a modal window regardless of the value of the `modal` URL parameter.

If the `modal` attribute is set to `true` but the `modal` URL parameter is set to `false`, the form will still be displayed in a modal window when the button is clicked.

## Troubleshooting

If you are experiencing issues with the form not displaying or displaying incorrectly, try the following steps:

- Make sure that the ID parameter is correct and that a form with that ID exists.
- Check that the shortcode is properly formatted and that all required parameters are provided.
- Check the URL parameters to ensure that they are properly formatted and that they correspond to the options available in the form.
- Check your theme's CSS to see if it is conflicting with the form's styles.
- If you have made any customizations to the form's HTML or CSS, make sure that they are properly implemented and do not cause any errors.

If you are still experiencing issues, you can try clearing your browser's cache and cookies or trying a different browser. If the problem persists, you can contact support for further assistance.

## Submitting a GitHub Issue

If you encounter any bugs or have suggestions for improvements, you can submit a GitHub issue by following these steps:

1. Click on the "Issues" tab.
2. Click the "New Issue" button.
3. Fill out the issue form with a descriptive title, a detailed description of the problem or suggestion, and any relevant information such as error messages or screenshots.
4. Click the "Submit new issue" button.

Please note that there may be limited support for this shortcode, as it is provided as-is without any guarantees or warranties. If you require more extensive support, you may want to consider hiring a developer to assist you.

## Disclaimer
This shortcode is provided "as is" without any guarantees or warranties of any kind. We are not responsible for any damages that may occur as a result of using this shortcode. You use this shortcode at your own risk.

By using this shortcode, you agree to indemnify and hold us harmless from any claims, damages, or expenses that may arise from your use of this shortcode.

We reserve the right to modify, update, or discontinue this shortcode at any time without notice.

Our plugin relies on a third-party service, CanadaHelps (https://www.canadahelps.org/), for displaying your CanadaHelps forms with our shortcode. By using our plugin, you acknowledge and agree to be bound by the CanadaHelps Terms of Use (https://www.canadahelps.org/en/terms-of-use/) and Privacy Policy (https://www.canadahelps.org/en/privacy-policy/). Please make sure to review these documents before using our plugin.
We are not affiliated with CanadaHelps and are not responsible for their services or any issues that may arise from the use of their services. For any questions or issues related to CanadaHelps, please refer to their website (https://www.canadahelps.org/) or contact them directly.
If you have any questions or concerns about the use of CanadaHelps in our plugin, please do not hesitate to contact us.
