<?php
	if(isset($_REQUEST['max'])&&isset($_REQUEST['count'])){
		$h=10;
		$w=100;
		$im=imagecreate($w,$h);
		$white=imagecolorallocate($im,255,255,255);
		$bar=imagecolorallocate($im,0,0,255);
		imagefill($im,$white);
		imagefilledrectangle($im,0,0,$w*($_REQUEST['count']/$_REQUEST['max']),$h,$bar);
		header('Content-type: image/png');
		imagepng($im);
	}
?>