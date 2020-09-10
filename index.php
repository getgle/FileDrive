<html>
	<head>
		<title>FileDrive</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		
		<div class="container-fluid h-100 d-inline-block">
			<div class="row h-100">
			<div id="sidebar" class="col-sm- h-100 d-inline-block">
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<input id="fileTitle" name="fileTitle" type="text" placeholder="File Title" class="form-control" maxlength="50" value="" autocomplete="off">
					<input id="fileAttachment" name="fileAttachment" type="file" class="form-control-file">
					<div class="text-center">
					<label for="fileAttachment" id="fileAttachmentLabel">
						<img src="static/upload2.png" style="height:100px;">
					</label>
					</div>
					<input id="submit" type="submit" value="Upload File" placeholder="File Title" class="form-control">
				</form>
				
				</div>
				<div class="col" id="list">
					<?php
					include("list.php");
					?>
				</div>
				</div>
			</div>
	</body>
</html>
