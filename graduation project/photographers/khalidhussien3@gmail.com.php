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
    <title>photographer</title>
    <link rel="stylesheet" href="photo.css">
    <link rel="stylesheet" href="lightbox.min.css">
  </head>
  <body>
    <div class="main">
      <!--***********      Navigation bar     ************-->
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
</div> <br>
      <!--*********  The page  ******-->

      <!--****************  Java Script   **************-->
      <script type="text/javascript" src="js/lightbox-plus-jquery.min.js">
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
      </script>

      <!--**************** The end of Java Script   **************-->

        <div class="profile-card">
          <div class="img">
            <?php
       $sql1 = "SELECT * FROM profile_photo
       where Photographer_User_User_email ='khalidhussien3@gmail.com' limit 1";
       $res1 = mysqli_query($conn,  $sql1);
       if (mysqli_num_rows($res1) > 0) {
         while ($images = mysqli_fetch_assoc($res1)) {
           ?>
            <img src="uploads/<?=$images['profile_photo']?>" >
            <?php } }?>
              </div>
          <div class="caption">
            <h3><label for="file"><u>Choose your photo </u> <br> </label> </h3>
                <label for="file"><img src="image.png" width="35" height="35"></label>
          </div>
        </div>
        <div class="photograher">
          <?php
            $sql = " select * from user
where User_email = 'khalidhussien3@gmail.com'

;";
    $ID++;
          $result = mysqli_query($conn,$sql);
          $quertResult = mysqli_num_rows($result);
          if($quertResult > 0)
           {
             while ($row = mysqli_fetch_assoc($result))
             {
          echo "<div class = 'photographer'>
          <h1>".$row['User_Fname']." ".$row['User_Minit']." ".$row['User_Lname']."</h1>

          </div>";
             }
           }
          ?>
        </div>
        <table class="tab">
          <tr>
            <td>
              <form action="upload_prof.php" method="post" enctype="multipart/form-data">
                <input type="file" id="file" accept="image/*" name="my_image" class="upd" />
                <input type="submit" name="submit" value="Upload profile image" class="bt"/>
              </form>
            </td>
            <td>
              <form action="delete_profile_photo.php" method="post" enctype="multipart/form-data">
                <input type="submit" name="submit" value="Delete profile image" class="bt" />
              </form>
            </td>
            <td>
            </td>

            <td>
              <div class="photograher">
                <?php
                  $sql = "SELECT * FROM photographer
                   where User_User_email = 'khalidhussien3@gmail.com'";
          $ID++;
                $result = mysqli_query($conn,$sql);
                $quertResult = mysqli_num_rows($result);
                if($quertResult > 0)
                 {
                   while ($row = mysqli_fetch_assoc($result))
                   {
                echo "<div class = 'photographer'>
                <h1>".$row['Photographer_level']."</h1>
                <h1>".$row['Photographer_bio']."   "."</h1>
                <h1>".$row['Photographer_fees']."   "."</h1>
                <h1>".$row['Photographer_status']."   status"."</h1>
                <h1>".$row['Photographer_studio']."   studio"."</h1>
                </div>";
                   }
                 }
                ?>
              </div>
            </td>
            <td>
              <div class="photograher">
                <?php

                 $sql1 = "SELECT * FROM available_time
                 where Photographer_User_User_email = 'khalidhussien3@gmail.com' limit 1";
                 $ID++;
                $result1 = mysqli_query($conn,$sql1);
                $quertResult1  = mysqli_num_rows($result1);
                if($quertResult1 > 0)
                {
                  while ($row1 = mysqli_fetch_assoc($result1))
                  {
                    echo "<div class = 'photographer'>
                    <h1>"."start time " .$row1['work_time_start']."   Am"."</h1>
                    <h1>"."end time   " .$row1['work_time_end']."   AM"."</h1>
                    </div>";
                  }
                }
                ?>
              </div>
            </td>
            <td>
              <div class="photograher">
                <?php
                 $sql2 = " SELECT Categories_Categories_type from Photo_Categories
               where Photographer_User_User_email = 'khalidhussien3@gmail.com' limit 1";
                 $ID++;
                $result2 = mysqli_query($conn,$sql2);
                $quertResult2  = mysqli_num_rows($result2);
                if($quertResult2 > 0)
                {
                  while ($row2 = mysqli_fetch_assoc($result2))
                  {
                    echo "<div class = 'photographer'>
                    <h1>".$row2['Categories_Categories_type']." Category "."</h1>

                    </div>";
                  }
                }
                ?>
              </div>
            </td>
            <td>
              <div class="photograher">
                <?php
                 $sql2 = "  SELECT * FROM  rating
       WHERE  User_User_email = 'khalidhussien3@gmail.com' limit 1 ";
                $result2 = mysqli_query($conn,$sql2);
                $quertResult2  = mysqli_num_rows($result2);
                if($quertResult2 > 0)
                {
                  while ($row2 = mysqli_fetch_assoc($result2))
                  {
                    echo "<div class = 'photographer'>
                    <h1>".$row2['User_rate']." Stars "."</h1>

                    </div>";
                  }
                }
                ?>

              </div>
            </td>
          </tr>
        </table>
        <br><hr><hr>
      <div class="baqe">
        <table class="tab">
          <tr>
            <th>
              <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="my_image" id="uplo" multiple />
                  <label class="lab2" for="uplo"><img src="image1.png" width="25" height="25" style="margin:0px 4px 0px 4px;"><b>Click here to insert your photos  </b></label><br><br>
            </th>
          </tr>
          <tr>
            <td>
                  <input type="submit" name="submit" value="Upload" class="bt2" />
                </form>
            </td>
            <td>
              <form action="delete_photo.php" method="post" enctype="multipart/form-data">
                <input type="submit" name="submit" value="Delete image" class="bt2" />
              </form>
            </td>
          </tr>
        </table>
        <div class="gallary">
          <?php
     $sql = "SELECT * FROM photos
     where Photographer_User_User_email ='khalidhussien3@gmail.com' ORDER BY photo_id DESC limit 6";
     $res = mysqli_query($conn,  $sql);
     if (mysqli_num_rows($res) > 0) {
       while ($images = mysqli_fetch_assoc($res)) {
         ?>
 <img src="uploads/<?=$images['photo']?>" height="200" width="300">
      <?php } }?>
        </div>
      </div>
    </div>
  </body>
</html>
