<?php
session_start();
if (isset($_POST['submit2']) && isset($_FILES['my_image2'])) {
	include "db_conn.php";
	$ID=0;
	   if (isset($_SESSION['Email']))
		 $Photographer_User_User_email= $_SESSION['Email'];
	echo "<pre>";
	print_r($_FILES['my_image2']);
	echo "</pre>";

	$img_name = $_FILES['my_image2']['name'];
	$img_size = $_FILES['my_image2']['size'];
	$tmp_name = $_FILES['my_image2']['tmp_name'];
	$error = $_FILES['my_image2']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: photographer.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png");

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name2 = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name2;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database'

				$sql = "	UPDATE profile_photo
				set profile_photo ='$new_img_name2' where Photographer_User_User_email = '$Photographer_User_User_email' ";
				 $ID++;
				mysqli_query($conn, $sql);



				header("Location: photographer.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: photographer.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: photographer.php?error=$em");
	}

}else {
	header("Location: photographer.php");
}
