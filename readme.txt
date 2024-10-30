=== Call Sign Query Widget ===
Contributors: mbroek
Tags: ham, d-star, amateur radio, ham radio, call sign, callsign, dstar, roepnaam, registratie, aprs, dwgn
Requires at least: 3.1.0
Tested up to: 3.8
Stable tag: 0.4

Provides a simple widget form to search for call sign registration information
on several websites.

== Description ==

<p>This widget places a search box for call sign information on your site.  Use
this search box to search information on remote websites.  You can use this to
query http://aprs.fi/, http://www.qrz.com/db/ or 
https://pi1utr.dstargateway.org/cgi-bin/dstar-regcheck.
</p>

<p>The following aspects are customizeable:
<ul>
<li>Widget title</li>
<li>Search button text</li>
<li>Search field help text</li>
<li>Search URL</li>
<li>URL parameter value</li>
</ul>
The following aspects are not *yet* customizeable:
<ul>
<li>The width of the text input</li>
</ul>
</p>
<p>Pressing the search button pops open a new window with the search
results.</p>
<p>To use the widget for QRZ lookup use:
<ul>
<li>Set URL to "http://www.qrz.com/db/"</li>
<li>Set parameter value to "callsign"</li>
</ul>
To use the widget for APRS.fi lookup use:
<ul>
<li>Set URL to "http://aprs.fi/"</li>
<li>Set parameter value to "call"</li>
</ul>
To use the widget for Dutch D-Star registration check use:
<ul>
<li>Set URL to "https://pi1utr.dstargateway.org/cgi-bin/dstar-regcheck"</li>
<li>Set parameter value to "callsign"</li>
</ul>
</p>


== Installation ==

1. Add a directory called 'callsignquery' (without the quotes) to your 
   '/wp-content/plugins/' directory.
1. Upload callsignquery.php to '/wp-content/plugins/callsign-query/'
   directory.
1. Activate the plugin through the 'Manage Plugins' page in WordPress.
1. Place the widget in the sidebar using the editor for your theme.
1. Edit the widget to your needs and save.


== Frequently Asked Questions ==

= What is this about? =

This plugin was original written for the Dutch D-Star Registration Check. 
But it can also be used to query www.qrz.com/db or aprs.fi.

This plugin looks a lot like the QRZ.com search widget, but in this plugin
allmost everything can be customized.


== Changelog ==

= 0.1 =
* Initial release of the plugin.

= 0.2 =
* Fixed some XHTML 1.0 Strict errors.
* Added configuration of URL and parameter.

= 0.3 =
* Rewrote to a universal international version.
* First public release.


