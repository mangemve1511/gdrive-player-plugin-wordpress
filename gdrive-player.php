<?php
/**
 * Plugin Name: Google Drive Player // Tên của plugin
 * Plugin URI: http://phukiendt.net // Địa chỉ trang chủ của plugin
 * Description: Play một video từ Google Drive // Phần mô tả cho plugin
 * Version: 1.0 // Đây là phiên bản đầu tiên của plugin
 * Author: Park Ji Hưng // Tên tác giả, người thực hiện plugin này
 * Author URI: http://appsharefree.com // Địa chỉ trang chủ của tác giả
 * License: GPLv2 or later // Thông tin license của plugin, nếu không quan tâm thì bạn cứ để GPLv2 vào đây
 */
 
include "curl_gd.php";
	
add_shortcode('gdrive', 'video-play');
function video-play( $input ){
	$url = $input['input-url'] ;    // Tìm cách nhận giá trị từ  shortcode
	$height = $input['input-h'];	// Truyền vào 3 tham số
	$width = $input['input-w'];
	$tmp = explode("file/d/",$url);
	$tmp2 = explode("/",$tmp[1]);
	$id = $tmp2[0];
	$linkdown = trim(getlink($id));
	
	echo('
	<div id="{$id}"></div>
	<script type="text/javascript">
		jwplayer().setup({
			file: "{$linkdown}",
			skin: "seven",
			autostart: true,
			width: "{$width}%",
			aspectratio: "16:{$height}",
			primary: "html5",
			aboutlink:"http://phimhay-hd.xyz",
			abouttext:"Xem phim hay miễn phí tại http://phimhay-hd.xyz",
			logo: {
				file: "/phimhay-hd-logo.png",
				link: "http://phimhay-hd.xyz",
			},
	</script>
	');
}
?>