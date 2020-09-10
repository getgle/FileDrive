<?php
$file = $_GET["q"];
$ext = pathinfo($file, PATHINFO_EXTENSION);

switch(strtolower($ext)){
	case "txt":
	case "php":
	case "php5":
	case "phtml":
	case "css":
		header("Content-Type: text/plain");
		break;
	case "webm":
		header("content-Type: video/webm");
		break;
	case "ogg":
		header("content-Type: audio/ogg");
		break;
	case "webp":
		header("content-Type: image/webp");
		break;
	case "png":
		header("content-Type: image/png");
		break;
	case "gif":
		header("content-Type: image/gif");
		break;
	case "jpeg":
	case "jpg":
		header("content-Type: image/jpeg");
		break;
	default:
		header("content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=" . '"' . $file . '"');
		break;
}
echo file_get_contents("uploads/src/" . $file . "-download");

?>
