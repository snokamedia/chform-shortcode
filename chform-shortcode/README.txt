=== Snoka Shortcode for CanadaHelps ===
Contributors: snokamedia
Donate link: https://www.buymeacoffee.com/snoka
Tags: shortcode, canadahelps
Requires at least: 4.7
Tested up to: 6.0.2
Stable tag: 1.0.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Snoka Media's CanadaHelps donation shortcode plugin adds a shortcode to embed CanadaHelps forms with support for undocumented URL parameters that can be used with donation widgets on external pages and automatic language selection.

== Installation ==
1. Download and unzip the plugin
2. Add the shortcode to the pages you want to display the form e.g.[chform id=12345]. Enter the page id provided by CanadaHelps.

== Attributes ==
Required: id
The page id from the embed code provided by CanadaHelps.

Optional: language
Options: en or fr
Language is otherwise automatically set with get_locale()

== URL Parameter Usage ==
Example:
?amount=1000&frequency=monthly

amount:
It requires a minimum amount of 3 which is CanadaHelps' minimum.

frequency:
The only option is monthly.

== Third-Party Service ==
Our plugin relies on a third-party service, CanadaHelps (https://www.canadahelps.org/), for displaying your CanadaHelps forms with our shortcode. By using our plugin, you acknowledge and agree to be bound by the CanadaHelps Terms of Use (https://www.canadahelps.org/en/terms-of-use/) and Privacy Policy (https://www.canadahelps.org/en/privacy-policy/). Please make sure to review these documents before using our plugin.

We are not affiliated with CanadaHelps and are not responsible for their services or any issues that may arise from the use of their services. For any questions or issues related to CanadaHelps, please refer to their website (https://www.canadahelps.org/) or contact them directly.

If you have any questions or concerns about the use of CanadaHelps in our plugin, please do not hesitate to contact us
