<?php
function makeRow($title, $ext, $date, $download){
	$whitelist = ["png", "gif", "jpg", "jpeg", "webm", "webp", "txt", "php", "php5", "phtml"];
	$imagelist = ["png", "gif", "jpg", "jpeg", "webm", "webp"];
	if(in_array($ext, $whitelist)){
		return "<tr>" . "<td scope='col'>" . $title . "</td>" . "<td scope='col'>" . $ext . "</td>" . "<td scope='col'>" . $date . "</td>" . "<td scope='col'>" . "<a href='file.php?q=" .  substr($download, 12, -9) . "'>View</a> " . "</td>" . "</tr>";
	} else {
		return "<tr>" . "<td scope='col'>" . $title . "</td>" . "<td scope='col'>" . $ext . "</td>" . "<td scope='col'>" . $date . "</td>" . "<td scope='col'>" . "<a href='file.php?q=" .  substr($download, 12, -9) . "'>Download</a> " . "</td>" . "</tr>";

	}
}
$files = json_decode(file_get_contents("uploads/files.json"));
?>
<table class="table">
	<thead>
		<th scope="col">Title.</th>
		<th scope="col">Ext.</th>
		<th scope="col">Date.</th>
		<th scope="col">Links.</th>
		<?php
		foreach($files as $file){
			echo makeRow($file->title, $file->ext, $file->date,  $file->download);
		}
		?>
	</thead>
</table>
