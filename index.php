<?php

if(isset($_POST["submit"])) {

	$target_dir = "uploads/";
	$target_file = $target_dir . $_FILES["fileToUpload"]["name"];

	$success = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

}


// $dir = 'uploads/';
// $files1 = scandir($dir);

// print_r($files1);

$all_files = scandir("uploads");




$uploads = array_diff($all_files, ['..', '.']);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Image upload</title>
</head>
<body>
	<div class="container">
		<div class="row shadow-lg p-3 mb-5 bg-ifo rounded">
			<h1>Gallery</h1><br>
		</div>
		<div class="row">
			<form action="index.php" method="post" enctype="multipart/form-data">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" name="fileToUpload">
					<label class="custom-file-label bg-dark text-light" for="image">Choose file</label>
				</div>
				<div id="in" class="input-group-append">
					<input class="btn btn-outline-info btn-block" name="submit" type="submit" value="Upload">
				</div>
			</form>
		</div>
		<div class="row shadow-lg p-3 mb-5 bg-ifo rounded">
			<?php foreach ($uploads as $upload) {
				echo "<div id='box' class='col-md-4'>";
				echo "<img class='pict' src='uploads/$upload'>";
				echo "</div>";
			} 
			?>
		</div>
	</div>	
</div>
</body>
</html>