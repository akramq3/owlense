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
<html>
 <head>
  <title>My Schedule </title>
  <link rel="stylesheet" href="schedule.css">
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
                    echo "<li><a href='http://localhost/graduation project\scheduling\schedule.php'>My Schedule</a></li>";
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
<br></br><br></br>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>

  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',

    eventResize:function(event)
    {
     var id = event.id;
     var title = event.title;
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var street = event.street;
     var city = event.city;
     var gov = event.gov;
     var payment = event.payment;
     var Client_User_User_email = event.Client_User_User_email;
     var Photographer_User_User_email = event.Photographer_User_User_email;
    },
   });
  });

  </script>
 </head>
 <body>
  <br />
  <h2 align="center"><a href="#">My Schedule</a></h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>
 </body>
</html>
