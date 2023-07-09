=== Easy Custom Css and Js ===
Created: 10/05/2023
Contributors: meheraj185
Email: mdmeheraj185@gmail.com
Tags: CSS, JS, javascript, custom CSS, custom JS, custom style, site css, add style, customize theme, custom code, external css, css3, style, styles, stylesheet, theme, editor, design, admin
Requires at least: 5.2
Tested up to: 6.3 
Stable tag: 1.0.0
License: GPLv2 or later 
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires PHP: 5.2.4

You can add easily Custom CSS or JS to your website with an awesome code editor.

== Description ==

Customize your WordPress site's appearance by easily adding custom CSS and JS code without even having to modify your theme or plugin files. This is perfect for adding custom CSS tweaks to your site. 

= Features =

* **Text editor** with Drakula theme
* Print the code in the **header** or the **footer**
* Add CSS or JS to the **frontend**
* Add as many codes as you want
* Keep your changes also when you change the theme

== Installation ==

* From the WP admin panel, click "Plugins" -> "Add new".
* In the browser input box, type "Simple Custom CSS and JS".
* Select the "Simple Custom CSS and JS" plugin and click "Install".
* Activate the plugin.


== Frequently Asked Questions ==

= Can I use CSS rules like @import and @font-face? =
Yes.

= My code doesn't show on the website =
Try one of the following:
1. If you are using any caching plugin (like "W3 Total Cache" or "WP Fastest Cache"), then don't forget to delete the cache before seing the code printed on the website.
2. Make sure the code is in **Saved**.

= Will this plugin affect the loading time? =
When you click the `Save` button the codes will be cached in files, so there are no tedious database queries.

= What if I change the theme? =
The CSS and JS are independent of the theme and they will persist through a theme change. This is particularly useful if you apply CSS and JS for modifying a plugin's output. 

= Can I upload images for use with my CSS? =
Yes. You can upload an image to your Media Library, then refer to it by its direct URL from within the CSS stylesheet. For example:
`div#content_box {
    background-image: url('http://example.com/wp-content/uploads/2023/05/image.jpg');
}`

= Who can publish/edit/delete Custom Codes? =
By default only the Administrator will be able to publish/edit/delete Custom Codes.


== Changelog ==

= 1.0.0 =

* Initial version.


== Upgrade notice ==
N/A.