<?php
session_start();
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "db_conn.php";
	$ID=0;
	   if (isset($_SESSION['Email']))
		 $Photographer_User_User_email= $_SESSION['Email'];

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: default.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png");

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO profile_photo
				        VALUES('$ID','$new_img_name','$Photographer_User_User_email') ";
								$ID++;
				mysqli_query($conn, $sql);

				header("Location: photographer.php");
			}else {
				echo '<script>alert("You cant upload files of this type")</script>';
     header("Location: photographer.php");
			}
		}
	}else {
		echo '<script>alert("you Must choose photo first")</script>';
	}
	header("Location: photographer.php");

}else {
	header("Location: photographer.php");
}
