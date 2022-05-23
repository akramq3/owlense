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

                echo '<a href=';echo $userEmail .'.php>'.$row["User_email"];
                echo ''.$row['User_Fname'];
                }
}
?>
<?php

    if (isset($_SESSION['Email']))
    $Client_User_User_email= $_SESSION['Email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>



    <title>owlense </title>
    <link rel="stylesheet" href="choose2.css">
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
              </ul>
          </div>
<form action = "search.php" method = "POST">
          <div class="search">
              <input class="srch" type="search" name="search_bar" placeholder="Search a photograher">
              <a href="#"> <button class="btn" name="search_a">Search</button></a>
          </div>
</form>
</div><br></br>
        <div class="content">
		     <br>
			<form method="post">


			<table  style=" solid black;margin-left:auto;margin-right:auto;">
				<tr>
					<td><h2 class="type0">Start Time</h2><input type="datetime-local" name="ST" class="type1"><br></td>
					<td><input type="submit" name="Most_Available" value="Most Available" class="type2"></td>
					<td></td>
          <td rowspan=6>
					<div class="container">
    <div class="main-card">
      <div class="cards">
        <div class="card">
         <div class="content">
           <div class="img">
             <img src="images/img3.jpg" alt="">
           </div>
           <div class="details">
             <div class="name">
               <?php
              if (isset($_POST['Most_Available'])) {
                  $ST=$_POST['ST'];
                $ET=$_POST['ET'];
                  $sql = " SELECT Photographer_User_User_email FROM available_time WHERE available_start_time = '$ST' AND available_end_time = '$ET' limit 1" ;
                     $res=$conn->query($sql);
                          while($row=$res->fetch_assoc()){
                            $userEmail=$row['Photographer_User_User_email'];
                              echo '<a href=';echo $userEmail .'.php>'.$row["Photographer_User_User_email"];
                          }
              }
              ?>
              <?php
              if (isset($_POST['Nearest_city'])) {
                  $studio=$_POST['studio'];

                  $sql= " SELECT  User_email FROM User WHERE User_city = '$studio' and User_type = 'photographer' limit 1" ;
                   $res=$conn->query($sql);
                             while($row=$res->fetch_assoc()){
                               $userEmail=$row['User_email'];
                                 echo '<a href=';echo $userEmail .'.php>'.$row["User_email"];
                         }
              }
             ?>
             <?php
             if (isset($_POST['Nearest_studio'])) {
                 $studio=$_POST['studio'];
                 $sql = " SELECT User_User_email FROM photographer WHERE Photographer_studio='$studio' limit 1 " ;
                  $res=$conn->query($sql);
                            while($row=$res->fetch_assoc()){
                              $userEmail=$row['User_User_email'];
                                echo '<a href=';echo $userEmail .'.php>'.$row["User_User_email"];

                            }
             }
             ?>
             <?php
                if (isset($_POST['Best_Rate'])) {
                   $sql = "SELECT User_User_email,User_rate from rating where User_rate in (SELECT MAX(User_rate)FROM rating WHERE User_type like '%photographer%')and User_type like '%Photographer%' limit 1";
                        $res=$conn->query($sql);
                             while($row=$res->fetch_assoc()){
                               $userEmail=$row['User_User_email'];
                                 echo '<a href=';echo $userEmail .'.php>'.$row["User_User_email"];

                             }
                  }
                  ?>
             </div>
             <div class="job">Photographer</div>
           </div>
           <div class="media-icons">
             <a href="#"><i class="fab fa-facebook-f"></i></a>
             <a href="#"><i class="fab fa-twitter"></i></a>
             <a href="#"><i class="fab fa-instagram"></i></a>
             <a href="#"><i class="fab fa-youtube"></i></a>
           </div>
         </div>
        </div>
      </div>
      </div>
    </div>

    					</td>

				</tr>
				<tr>
					<td><h2 class="type0">End Time </h2><input type="datetime-local" name='ET' class="type1"><br></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan=3 ><hr></td>
				</tr>
				<tr>
					<td><h2 class="type0">City </h2><input type="text" name="studio" class="type1"><br></td>
					<td><input type="submit" name="Nearest_studio" value="Nearest studio" class="type2"></td>
					<td><input type="submit" name="Nearest_city" value="Nearest city" class="type2"></td>
				</tr>
				<tr>
					<td colspan=3><hr><td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="Best_Rate"  value="Best Rate" class="type2"></td>
        	<td></td>
				</tr>
			</table>
			</form>
        </div>
    </div>
</body>
</html>
