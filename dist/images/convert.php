<?php
	if(isset($_POST['submit'])){
		$target_dir = "./";
		$target_file = $target_dir . basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
		echo "Ảnh đã được upload thành công.";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Upp Ảnh Lấy Link </title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<label for="file">Chọn Ảnh để upload:</label>
		<input type="file" name="file" id="file"><br><br>
		<input type="submit" value="Upload" name="submit">
	</form>
</body>
</html>

