<?php
session_start();
  include 'connect.php';
$ID=0;

if (isset($_SESSION['Email']))

  $Photographer_User_User_email= $_SESSION['Email'];

if(isset($_POST['search_a']))
{
    $search_value=$_POST['search_bar'];
    $query1="SELECT User_email,User_Fname FROM photoshoot.user WHERE User_Fname='".$search_value."'";
    $res=mysqli_query($conn,$query1);
     while($row=$res->fetch_assoc()){
             $userEmail=$row['User_email'];

                echo '<table id="table" align="center"><tr><td>User_email</td><td><a href=';echo $userEmail .'.php>'.$row["User_email"];
                echo '</a></td></tr><tr><td>User_Fname</td><td>'.$row['User_Fname'];
                echo '</td></tr></table>';

                }
}
if (isset($_POST['submit'])) {


  				$Photographer_level= $_POST['Photographer_level'];
  				$Photographer_studio=$_POST['Photographer_studio'];
  				$Photographer_bio=$_POST['Photographer_bio'];
  				$Photographer_status=$_POST['Photographer_status'];
  				$Photographer_fees=$_POST['Photographer_fees'];
          $work_time_start=$_POST['work_time_start'];
          $work_time_end=$_POST['work_time_end'];
          $category=$_POST['category'];

                  $select = mysqli_query($conn, "  SELECT * from photographer , available_time, photo_categories
                 where User_User_email = '".$Photographer_User_User_email."'
                 and available_time.Photographer_User_User_email = '".$Photographer_User_User_email."'
                 and photo_categories.Photographer_User_User_email ='".$Photographer_User_User_email."' " );
                 if(mysqli_num_rows($select)) {
                echo '<script>alert("Email has been added before")</script>';
                }
                else
                {
                   $mysqli3= "CALL create_date_for_year(2022, '$Photographer_User_User_email','$work_time_start','$work_time_end');";
                   $sql = "INSERT INTO photographer
                              VALUES('$ID','$Photographer_level','$Photographer_User_User_email',
                              '$Photographer_studio','$Photographer_bio', '$Photographer_status',
                                    '$Photographer_fees' ) limit 1" ;
                     $sql1 = "INSERT INTO Photo_Categories
                                            VALUES('$ID','$category','$Photographer_User_User_email') limit 1;" ;
                   $sql2 = "INSERT INTO $category
                                       VALUES('$ID','$category','$Photographer_User_User_email') limit 1;" ;
                                            $ID++;
                            mysqli_query($conn, $sql1);
                            mysqli_query($conn, $sql2);
                            mysqli_query($conn,$mysqli3);
                            mysqli_query($conn, $sql);
                            header("Location: photographer.php");
               }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Photographer data</title>
	<link rel="stylesheet" href="default.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
      <div class="main">                              <!--****************  NAVBAR **************************-->
        <div class="navbar">
    <div class="icon">
        <h2 class="logo">Owlense</h2>
    </div>

    <div class="menu">
        <ul class="n">
            <li><a href="http://localhost/graduation project/home.php">HOME</a></li>
            <li><a href="http://localhost/graduation project/categories/categories_page.php">CATEGORIES</a></li>
            <li><a href="http://localhost/graduation project/index.php">LOGIN</a></li>
            <li><a href="http://localhost/graduation project/index.php">REGISTRAION</a></li>
        </ul>
        <ul class="n">

          <?php

          $sql = "select  *
        from user
        where user_type = 'Photographer' and User_email ='$Photographer_User_User_email'
        ;";
        $ID++;
        $result = mysqli_query($conn,$sql);
        $quertResult = mysqli_num_rows($result);

        if($quertResult > 0)
         {
            echo "  <li><a href='http://localhost/graduation project\photographers\photographer_data.php'>Insert Data</a>  </li>";

            echo "<li><a href='http://localhost/graduation project\scheduling\schedule.php '>My Schedule</a></li>";
              echo "<li><a href='http://localhost/graduation project\photographers\photographer.php '>My Page</a></li>";
         }
         ?>
              <li><a href="http://localhost/graduation project\appointement.php">Book Now</a></li>
              <li><a href="http://localhost/graduation project\about.php">about </a></li>
        </ul>
    </div>
<form action = "search.php" method = "POST">
    <div class="search">
        <input class="srch" type="search" name="search_bar" placeholder="Search a photograher">
        <a href="#"> <button class="btn" name="search_a">Search</button></a>
    </div>
</form>
</div><br>
                                  <!--****************  The Page **************************-->
<div class="container">
  <div class="book">
      <div class="description">
        <h1><strong><u><i> Your data is important to us</i></u></strong></h1>
        <div class="quote"><br>
          <p><h3> -- Enter your data from here </h3></p>
        </div>
        <ul class="uu"><br>
          <li><h4> First your available time </h4></li>
          <p> - tell us your available time. to manage your time and make appointments for you. </p>
          <li><h4> Second your photographer date</h4> </li>
          <p> - tell us your photographer date. to maximize your opportunities of getting booked. </p>
          <li><h4> Finally Your Category</li></h4>
          <p> - tell us your Category. to match the right client with you. </p>
        </ul>
      </div>
<div  class="form">
  <form method="post" ><br><br><br>
			<table style="width:100;">
        <tr><td><div class="inpbox">
           Start Time : <input type="time" name="work_time_start" required>
         </div></td>

       <td><div class="inpbox">
           END Time :  <input type="time" name="work_time_end" required>
         </div></td></tr>

			     <tr><td><div class="inpbox">
				              Level : <input type="text"name="Photographer_level" placeholder="Enter Your level Here :">
			            </div>
              </td>

			        <td><div class="inpbox">
				            Studio : <input type="text" name="Photographer_studio" placeholder="Enter Your studio Here :">
			            </div>
              </td></tr>

			      <tr><td><div class="inpbox">
				          Bio : <input type="text" name="Photographer_bio" placeholder="Enter Your Bio Here :">
			             </div>
                </td>

			       <td><div class="inpbox">
				          Status : </label><input type="text" name="Photographer_status" placeholder="Enter Your Status Here :">
	         </div></td>

			       <tr><td colspan="2"><div class="inpbox">
				         fees : </label><input type="text" name="Photographer_fees" placeholder="Enter Your fees Here :">
               </div></td>

               <tr><td colspan="2"><div class="inpbox">
                   category name : </label><input type="text" name="category" placeholder="Enter Your category Here :">
                  </div></td>

			            <tr><td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="insert" class="button"></td></tr>
	          </table>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
