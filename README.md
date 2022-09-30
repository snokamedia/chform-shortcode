# Snoka Shortcode for CanadaHelps

Snoka Media's CanadaHelps donation shortcode plugin adds support for undocumented URL parameters and automatic language selection via the [get_locale()](https://developer.wordpress.org/reference/functions/get_locale/ "get_locale()") function.

[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/snoka)
[![ko-fi](https://ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/W7W1FDHVR)
## Features:

#### URL parameters

This plugin supports undocumented URL parameters that can be used to prefill the amount and frequency with links and widgets on external pages.

#### Multilingual support

Automatic multilingual support via the [get_locale()](https://developer.wordpress.org/reference/functions/get_locale/ "get_locale()") function.

## Shortcode Usage
**Example:**

[chform id=12345 language=fr]

### Attributes

**Required:** id

The page id from the embed code provided by CanadaHelps.

**Optional:** language

Options: **en** or **fr**

Language is otherwise automatically set with [get_locale()](https://developer.wordpress.org/reference/functions/get_locale/ "get_locale()")

### URL Parameter Usage

**Example:**

?amount=1000&frequency=monthly

**amount**

It requires a minimum amount of 3 which is CanadaHelps' minimum.

**frequency**

The only option is **monthly**.
