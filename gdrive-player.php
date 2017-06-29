<?php
/**
 * Plugin Name: Google Drive Player
 * Plugin URI: http://phukiendt.net
 * Description: Play một video từ Google Drive
 * Version: 1.1
 * Author: Park Ji Hưng
 * Author URI: http://appsharefree.com
 * License: GPLv2 or later
 */

include "curl_gd.php";

add_shortcode('gdrive', 'video_play');
function video_play( $input ){
	extract( shortcode_atts( array(
		'input_url' =>   '',
		'type_url'   =>   '',
		'input_w'	=>'640'
	), $input ));
	$url = $input_url ;
	$t_url = $type_url;
	$width = $input_w;
	if ($t_url == 'direct') {
		$file = $url;
	}else {
		$file = Drive($url);
	}
	echo $file;
	$videojs = <<<_end_

	<!-- Star Google Drive Player for WordPress -->
	 <video controls autoplay width="$width" height="$height">
	    <!-- Video files -->
	    <source src="$file" type="video/mp4">
	  </video>
	<!-- End Google Drive Player for WordPress -->

_end_;

	return $videojs;

}

add_action('init', 'video_play');

?>
