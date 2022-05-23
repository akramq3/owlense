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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>owlense photographing</title>
      <link rel="stylesheet" href="homepage.css">

</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Owlense</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="http://localhost/graduation project/home.php">HOME</a></li>
                    <li><a href="http://localhost/graduation project/categories/categories_page.php">CATEGORIES</a></li>
                    <li><a href="http://localhost/graduation project/index.php">LOGIN</a></li>
                    <li><a href="http://localhost/graduation project/index.php">REGISTRAION</a></li>
                </ul>
                <ul>

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
                                  <li><a href="http://localhost/graduation project\starRating.php">Rate Photographer </a></li>
                </ul>
            </div>
<form action = "search.php" method = "POST">
            <div class="search">
                <input class="srch" type="search" name="search_bar" placeholder="Search a photograher">
                <a href="#"> <button class="btn" name="search_a">Search</button></a>
            </div>
</form>
        </div>
        <div class="content">
            <h1>OWLENSE<br> PHOTOGRAPHY<br> COMMUNITY</h1>


                <button class="cn"><a href="#">JOIN US</a></button>


                    </div>
                </div>
        </div>
    </div>

</body>
</html>
