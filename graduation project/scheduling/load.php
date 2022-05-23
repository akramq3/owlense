<?php
 session_start();
include 'connect.php';
//load.php


$ID=0;

if (isset($_SESSION['Email']))

  $Photographer_User_User_email= $_SESSION['Email'];



$connect = new PDO('mysql:host=localhost;dbname=photoshoot', 'root', '');

$data = array();

$query = "SELECT * FROM appointment where Photographer_User_User_email = '$Photographer_User_User_email' ";
$ID++;

$statement = $connect ->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["appointment_id"],
  'title'   => $row["appo_title"],
  'start'   => $row["appo_date_start"],
  'end'   => $row["appo_date_end"],
 

 );
}

echo json_encode($data);

?>
