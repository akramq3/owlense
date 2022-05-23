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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- ===== Link Swiper's CSS ===== -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- ===== Fontawesome CDN Link ===== -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    <title>owlense portrait category</title>
    <link rel="stylesheet" href="category_portraitpage.css" />
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
        </div>
      <br /><br>
      <div class="content">
          <br /><br />
        <button class="cnn"><a href="#">PORTRAIT PHOTOGRAPHERS</a></button>
      </div>
      <br /><br /><br /><br />
      <table style=" solid black;margin-left:auto;margin-right:auto;">
        <tr>
          <td></td>
          <td>
            <section>
              <div class="swiper mySwiper container">
                <div class="swiper-wrapper content">
                  <!--
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="images/img1.jpg" alt="">
            </div>

            <div class="media-icons">
              <i class="fab fa-facebook"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-github"></i>
            </div>

            <div class="name-profession">
              <span class="name">Photographer Name</span>
              <span class="profession">Photographer</span>
            </div>

            <div class="rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </div>

            <div class="button">
              <button class="aboutMe">My Page</button>
              <button class="hireMe">Book Me</button>
            </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="images/img2.jpg" alt="">
            </div>

            <div class="media-icons">
              <i class="fab fa-facebook"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-github"></i>
            </div>

            <div class="name-profession">
              <span class="name">Photographer Name</span>
              <span class="profession">Photographer</span>
            </div>

            <div class="rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </div>

            <div class="button">
              <button class="aboutMe">My Page</button>
              <button class="hireMe">Book Me</button>
            </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="images/img3.jpg" alt="">
            </div>

            <div class="media-icons">
              <i class="fab fa-facebook"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-github"></i>
            </div>

            <div class="name-profession">
              <span class="name">Photographer Name</span>
              <span class="profession">Photographer</span>
            </div>

            <div class="rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </div>

            <div class="button">
              <button class="aboutMe">My Page</button>
              <button class="hireMe">Book Me</button>
            </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="images/img4.jpg" alt="">
            </div>

            <div class="media-icons">
              <i class="fab fa-facebook"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-github"></i>
            </div>

            <div class="name-profession">
              <span class="name">Photographer Name</span>
              <span class="profession">Photographer</span>
            </div>

            <div class="rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </div>

            <div class="button">
              <button class="aboutMe">My Page</button>
              <button class="hireMe">Book Me</button>
            </div>
          </div>
        </div>-->
                  <div class="swiper-slide card">
                    <div class="card-content">
                      <div class="image">
                       <?php
                  $sql1 = " select  * from profile_photo
      inner join portrait on Photo_Categories_Photographer_User_User_email = profile_photo.Photographer_User_User_email
      where Photo_Categories_Categories_Categories_type in(
      select  Photo_Categories_Categories_Categories_type
      from portrait
      where Photo_Categories_Categories_Categories_type ='portrait') and portrait_Category_id = 1 ;";
                  $res1 = mysqli_query($conn,  $sql1);
                  if (mysqli_num_rows($res1) > 0) {
                    while ($images = mysqli_fetch_assoc($res1)) {
                      ?>
                       <img src="uploads/<?=$images['profile_photo']?>" >
                       <?php } }?>
                      </div>

                      <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                      </div>

                      <div class="name-profession">
                        <?php
                        $sql = "select  * from user
                      inner join portrait on Photo_Categories_Photographer_User_User_email = user.User_email
                      where Photo_Categories_Categories_Categories_type in(
                      select  Photo_Categories_Categories_Categories_type
                      from portrait
                      where Photo_Categories_Categories_Categories_type ='portrait') and portrait_Category_id = 1 ;";
				      $result = mysqli_query($conn,$sql);
				      $quertResult = mysqli_num_rows($result);

				      if($quertResult >0)
                        {
                           while ($row = mysqli_fetch_assoc($result)) {
                          echo "<div class='photographers'>
                          <h2>
                            ".$row['User_Fname']." ".$row['User_Minit']."
                            ".$row['User_Lname']."
                          </h2>
                          <h3>
                            ".$row['Photo_Categories_Categories_Categories_type']."

                          </h3>

                        </div>
                        "; } } ?>

                      </div>

                      <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                      </div>

                      <div class="button">
                        <button class="aboutMe" onclick="location.href='http://localhost/graduation project/photographers/mohamedmohsen30@gmail.com.php'">My Page</button>
                        <button class="hireMe" onclick="location.href='http://localhost/graduation project/appointement.php'">Book Me</button>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide card">
                    <div class="card-content">
                      <div class="image">
                       <?php
                  $sql1 = " select  * from profile_photo
      inner join portrait on Photo_Categories_Photographer_User_User_email = profile_photo.Photographer_User_User_email
      where Photo_Categories_Categories_Categories_type in(
      select  Photo_Categories_Categories_Categories_type
      from portrait
      where Photo_Categories_Categories_Categories_type ='portrait') and portrait_Category_id = 2 ;";
                  $res1 = mysqli_query($conn,  $sql1);
                  if (mysqli_num_rows($res1) > 0) {
                    while ($images = mysqli_fetch_assoc($res1)) {
                      ?>
                       <img src="uploads/<?=$images['profile_photo']?>" >
                       <?php } }?>
                      </div>

                      <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                      </div>

                      <div class="name-profession">
                        <?php
                        $sql = "select  * from user
                      inner join portrait on Photo_Categories_Photographer_User_User_email = user.User_email
                      where Photo_Categories_Categories_Categories_type in(
                      select  Photo_Categories_Categories_Categories_type
                      from portrait
                      where Photo_Categories_Categories_Categories_type ='portrait') and portrait_Category_id = 2 ;";
              $result = mysqli_query($conn,$sql);
              $quertResult = mysqli_num_rows($result);

              if($quertResult >0)
                        {
                           while ($row = mysqli_fetch_assoc($result)) {
                          echo "<div class='photographers'>
                          <h2>
                            ".$row['User_Fname']." ".$row['User_Minit']."
                            ".$row['User_Lname']."
                          </h2>
                          <h3>
                            ".$row['Photo_Categories_Categories_Categories_type']."

                          </h3>

                        </div>
                        "; } } ?>

                      </div>

                      <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                      </div>

                      <div class="button">
                        <button class="aboutMe" onclick="location.href='http://localhost/graduation project/photographers/khalidhussien3@gmail.com.php'">My Page</button>
                        <button class="hireMe" onclick="location.href='http://localhost/graduation project/appointement.php'">Book Me</button>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide card">
                    <div class="card-content">
                      <div class="image">
                          <img src="images/img6.jpg" alt="" />


                      </div>

                      <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                      </div>


                        <div class="name-profession">
                          <span class="name">Rana Hany</span>
                          <span class="profession">portrait</span>
                        </div>

                      <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                      </div>

                      <div class="button">
                        <button class="aboutMe">My Page</button>
                        <button class="hireMe" onclick="location.href='http://localhost/graduation project/appointement.php'">Book Me</button>
                      </div>
                    </div>
                  </div>
                    <!--
                  <div class="swiper-slide card">
                    <div class="card-content">
                      <div class="image">
                        <img src="images/img8.jpg" alt="" />
                      </div>

                      <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                      </div>

                      <div class="name-profession">

                      </div>

                      <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                      </div>

                      <div class="button">
                        <button class="aboutMe">My Page</button>
                      <button class="hireMe" onclick="location.href='http://localhost/graduation project/appointement.php'">Book Me</button>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide card">
                    <div class="card-content">
                      <div class="image">
                        <img src="images/img5.jpg" alt="" />

                      </div>

                      <div class="media-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-github"></i>
                      </div>
                      <div class="name-profession">

                      </div>

                      <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                      </div>

                      <div class="button">
                        <button class="aboutMe">My Page</button>
                        <button class="hireMe" onclick="location.href='http://localhost/graduation project/appointement.php'">Book Me</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination"></div>
            </section>
-->
            <!-- Swiper JS -->
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

            <!-- Initialize Swiper -->
            <script>
              var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                slidesPerGroup: 3,
                loop: true,
                loopFillGroupWithBlank: true,
                pagination: {
                  el: ".swiper-pagination",
                  clickable: true,
                },
                navigation: {
                  nextEl: ".swiper-button-next",
                  prevEl: ".swiper-button-prev",
                },
              });
            </script>
          </td>
          <td></td>
        </tr>
      </table>
    </div>
  </body>
</html>
