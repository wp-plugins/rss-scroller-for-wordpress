<?php
/*
Plugin Name: Rss Scroller for Wordpress
Plugin URI: http://blogs.swaind.com/vrsscroller
Description: This is a Horizontal Scroller for Wordpress to display any feed content. Please download and see the how to use it in Readme.txt file.
Version: 1.0
Author: Swaind
Author URI: http://blogs.swaind.com/

Copyright 2011 Chris . (email : chris.chenxt@swaind.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

//Define the plugin directory and url for file access.
$rssrcolleruploads = wp_upload_dir();

//add shortcode for wordpress
add_shortcode( 'rsscroller', 'rsscrunshortcode' );
function rsscrunshortcode($atts) {
	extract ( shortcode_atts(array(
		'url' => '',
		'width' => '',
		'height' => '',
		'speed' => ''
		), $atts)); 
	
	rsslshowrsscroller($url, $width, $height, $speed);
}


function rsslshowrsscroller($rssc_url,$rssc_width,$rssc_height,$rssc_speed) {

//limit speed
if ($rssc_speed > 20) { $rssc_speed = 20; }
elseif ($rssc_speed <0) { $rssc_speed = 0;}

//Display all contents
echo "<div width='{$rssc_width}px'><marquee direction='left' scrollamount='{$rssc_speed}' height='{$rssc_height}px'>";

// SimpleXML using getFeed functions
include "simplexml.rssparser.php";

getFeed ($rssc_url); 

echo "</marquee></div>";
}


?>