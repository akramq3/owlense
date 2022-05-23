
<?php
session_start();
  include 'db_conn.php';
	if (isset($_SESSION['Email']))
	$Photographer_User_User_email= $_SESSION['Email'];
				// Insert into Database
				$sql = "DELETE from photos
where Photographer_User_User_email ='$Photographer_User_User_email'
				";

				mysqli_query($conn, $sql);
					header("Location: photographer.php");



?>
