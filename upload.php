<?php
$whitelist = ["png", "jpeg", "jpg", "cpp", "txt", "gif"];
$ext = pathinfo($_FILES["fileAttachment"]["name"], PATHINFO_EXTENSION);

//$path = "uploads/src/" . basename($_FILES["fileAttachment"]["name"]);
$path = "uploads/src/" . uniqid() . "." . $ext . "-download";

//Check if file is valid
function fileValid($file){
	if(empty($file)){
		echo "Error: no file specified";
		return false;
	}
	echo $file['name'];
	return true;
}

// create file object
function indexFile($ext, $path){
	$title = htmlspecialchars($_POST["fileTitle"]);
	if(empty($title)){
		$title = "Untitled";
	}
	$file = array(
		"title" => substr($title, 0, 50),
		"ext" => $ext,
		"date" => date("Y/m/d g:i:s"),
		"download" => $path
	);
	// write to files.json
	$file_list = fopen("uploads/files.json", "c+");
	if(flock($file_list, LOCK_EX)){
		$db = json_decode(fread($file_list, filesize("uploads/files.json")));
		print_r($db);
		array_unshift($db, $file);
		ftruncate($file_list, 0);
		rewind($file_list);
		fwrite($file_list, json_encode($db));
		fflush($file_list);
		flock($file_list, LOCK_UN);
	} else {
		echo "Couldn't get the lock. Please try your upload again.";
	}
	fclose();
}
//upload file
if(fileValid($_FILES["fileAttachment"])){
	if(move_uploaded_file($_FILES["fileAttachment"]["tmp_name"], $path)){
		echo "File upload successful";
		indexFile($ext, $path);
	} else{
		echo "Upload failed.";
	}
}
?>
