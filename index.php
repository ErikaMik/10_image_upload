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
		<div class="row">
			<h1>Gallery</h1><br>
		</div>
		<div class="row">
			<form action="index.php" method="post" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" class="btn btn-info" value="Upload Image" name="submit">
			</form>
		</div>
		<div class="row">
			<?php foreach ($uploads as $upload) {
				echo "<div class='col-md-4'>";
				echo "<img class='pict' src='uploads/$upload'>";
				echo "</div>";
			} 
			?>
		</div>
			<!-- <?php if ($success) {
			echo "valio";
		} ?> -->
	</div>	
</div>
</body>
</html>