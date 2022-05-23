<?php
include 'connect.php';
session_start();
$ID=0;
   if (isset($_SESSION['Email']))
    $Client_User_User_email= $_SESSION['Email'];
    if (isset($_POST['Submit']))
    {
      $rate = 0 ;
      $radioVal = $_POST["rate"];
      $report_complaint=$_POST['report_complaint'];
      $Photographer_User_User_email=$_POST['Photographer_User_User_email'];
      if($radioVal == "First")
      {
          $rate= 1;
      }
      else if ($radioVal == "Second")
      {
         $rate= 2;
      }
      else if ($radioVal == "third")
      {
         $rate= 3;
      }
      else if ($radioVal == "forth")
      {
         $rate= 4;
      }
      else if ($radioVal == "fifth")
      {
         $rate= 5;
      }

      $select = mysqli_query($conn, "  SELECT * FROM report , give_rate
          WHERE report.Client_User_User_email = '$Client_User_User_email'
          and give_rate.Client_User_User_email  = '$Client_User_User_email'
          and report.Photographer_User_User_email = '$Photographer_User_User_email'
          and give_rate.Photographer_User_User_email = '$Photographer_User_User_email';");
if(mysqli_num_rows($select)) {
echo '<script>alert("rating and report has been added before")</script>';
          }
          else
          {
            $insert3= "INSERT INTO photoshoot.report
            VALUES ('$ID','$report_complaint', '$Client_User_User_email','$Photographer_User_User_email')" ;
             $insert1= "INSERT INTO photoshoot.give_rate  VALUES ('$ID','$rate', '$Client_User_User_email', '$Photographer_User_User_email')" ;
             $delete = " delete from rating where User_User_email = '$Photographer_User_User_email';";
             $insert2 = "INSERT INTO rating (User_rate, User_User_email, User_type) SELECT sum(give_rate) /count(Client_User_User_email) , '$Photographer_User_User_email' , 'photographer' FROM give_rate
             where Photographer_User_User_email = '$Photographer_User_User_email'; ";
          $ID++;
          mysqli_query($conn, $insert3);
          mysqli_query($conn, $delete);
          mysqli_query($conn, $insert1);
          mysqli_query($conn, $insert2);
          }
        }
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Rating </title>
    <link rel="stylesheet" href="rate.css">
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
                   where user_type != 'Client' and User_email !='$Client_User_User_email'
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
           </div>

        </div>

         <table class="center" ><tr><td>

      <span class="TH"><h2>Thanks for rating us</h2></span>
	  </td></tr>
	  <tr><td>
		<span class="TH"><h2>Edit</h2></span>
		</td></tr>
		<tr><td>
		<form action="#" method="POST">
      <div class="stars">
        <input type="radio" id="five" name="rate" value="fifth">
        <label for="five"></label>
        <input type="radio" id="four" name="rate" value="forth">
        <label for="four"></label>
        <input type="radio" id="three" name="rate" value="third">
        <label for="three"></label>
        <input type="radio" id="two" name="rate" value="Second">
        <label for="two"></label>
        <input type="radio" id="one" name="rate" value="First">
        <label for="one"></label>
        <span class="result"></span>

   </div>
</td>
</tr>

<tr><td>
<div class="textarea">
            <textarea
              cols="30"
              placeholder="Describe your experience.."
              name="report_complaint"
            ></textarea>

</td></tr>
<tr><td>
<input
        type="text"
        name="Photographer_User_User_email"
        class="type1"
        required />
</td></tr>
<tr><td>


		<div class="button">
            <button type="submit" name="Submit" class="submit" value="post">
              <h1 class="THi">Post</h1>
            </button>
          </div>
</td></tr>
		</form>
		</table>
  </body>
</html>
