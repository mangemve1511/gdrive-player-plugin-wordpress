<?php
/**
 * Plugin Name: Google Drive Player 
 * Plugin URI: http://phukiendt.net 
 * Description: Play một video từ Google Drive 
 * Version: 1.0 
 * Author: Park Ji Hưng 
 * Author URI: http://appsharefree.com 
 * License: GPLv2 or later
 */
 
include "curl_gd.php";
	
add_shortcode('gdrive', 'video_play');
function video_play( $input ){
	extract( shortcode_atts( array(
		'input_url' =>   '',
		'input_h'   =>   '360',
		'input_w'	=>'640'
	), $input ));
	$url = $input_url ;    
	$height = $input_h;	
	$width = $input_w;
	$tmp = explode("file/d/",$url);
	$tmp2 = explode("/",$tmp[1]);
	$id = $tmp2[0];
	$linkdown = trim(getlink($id));
	
	$videojs = <<<_end_

	<!-- Star Google Drive Player for WordPress -->
	 <video controls autoplay width="$width" height="$height">
	    <!-- Video files -->
	    <source src="$linkdown" type="video/mp4">
	  </video>
	<!-- End Google Drive Player for WordPress -->

_end_;

	return $videojs;
	
	
}

add_action('init', 'video_play');
?>
