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
<?php

  if (isset($_SESSION['Email']))
  $Client_User_User_email= $_SESSION['Email'];
       if (isset($_POST['Sub'])) {
                $title=$_POST['title'];
                $ST=$_POST['ST'];
                $ET=$_POST['ET'];
                $Street=$_POST["Street"];
                $City=$_POST["City"];
                $Gov=$_POST["Gov"];
                $Payment=$_POST['Payment'];
                $Photographer_User_User_email=$_POST['Photographer_User_User_email'];
                $radioVal = $_POST["payment"];
                if($radioVal == "Visa")
                {
                    $Payment="Visa";                       }
                else if ($radioVal == "Cash")
                {
                   $Payment="Cash";
                }
//most available
    $select = " SELECT Photographer_User_User_email FROM available_time WHERE available_start_time = '$ST' AND available_end_time = '$ET' " ;
    $result1 = mysqli_query($conn,$select);
    if ($result1->num_rows > 0) {
      // output data of each row
      while($row = $result1->fetch_assoc()) {
        $insert= "INSERT INTO photoshoot.appointment  VALUES ('$ID','$title', '$ST','$ET' ,'$Street', '$City',  '$Gov', '$Payment', '$Client_User_User_email', '$Photographer_User_User_email')" ;
        $ID++;
        $delete=" DELETE from available_time where available_start_time = '$ST' ";
        $result2=mysqli_query($conn,$insert);
        $result3=mysqli_query($conn,$delete);
        header("Location: creditcard.php");
      }
}
else {
header("Location: choose.php");
}
}
  ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Appointment</title>
		<link rel="stylesheet" href="appointement.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="main">
																		<!--****************  NAVBAR **************************-->
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
where user_type = 'Photographer' and User_email ='$Client_User_User_email'
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
        <br></br>

				<!--****************  The Page **************************-->
				<div class="container">
				  <div class="book">
				      <div class="description">
				        <h1><strong><u><i>Book</i></u></strong> Your Photographer</h1>
				        <div class="quote"><br>
				          <p><h3> -- Capture your moments in 3 easy steps</h3></p>
				        </div>
				        <ul class="uu"><br>
				          <li><h4> Find your photographer </h4></li>
				          <p> - Search your local photographers. Quickly find one that’s just right for your occasion, and near you. Browse their work and save your favorites</p>
				          <li><h4> Save the date</h4> </li>
				          <p> - Once you’ve selected your photographer it’s easy to book online 24/7 with a few simple clicks. Get everything set beforehand, so you can relax on the big day.</p>
				          <li><h4> the smiles</li></h4>
				          <p> - Stay connected with your photographer before, during and after the shoot. After they’ve captured the magic of your big day you can choose from several easy options to share.</p>
				        </ul>
				      </div>
							<div class="form">
        <form method="post"><br><br><br>
					<table style="width:100;">
		        <tr><td><div class="inpbox">
		           Start Time : <input type="datetime-local" name="ST" required>
		         </div></td>

		       <td><div class="inpbox">
		           End Time :  <input type="datetime-local" name="ET" required>
		         </div></td></tr>

					     <tr><td><div class="inpbox">
						              Category : <input type="text"name="title" placeholder="Enter the Title Here :">
					            </div>
		              </td>

					        <td><div class="inpbox">
						            Street : <input type="text" name="Street" placeholder="Enter the Street Here :">
					            </div>
		              </td></tr>

					      <tr><td><div class="inpbox">
						          City : <input type="text" name="City" placeholder="Enter the City Here :">
					             </div>
		                </td>

					       <td><div class="inpbox">
						          Gov : </label><input type="text" name="Gov" placeholder="Enter the Gov Here :">
			         </div></td>

						 </tr>
							 <tr><td style="width: 100%;"><div class="inrbox">
											Payment Visa : <input type="radio" name="Payment" value="Visa">
									</div></td>

									<td><div class="inrbox">
											Cash : <input type="radio" name="Payment" value="Cash">
									</div></td>



									<tr>
                    <td><div class="inpbox">
                         Photographer email : </label><input type="text" name="Photographer_User_User_email" placeholder="Enter the Photographer email Here :">
                  </div></td>
                    <td colspan="1" style="text-align: right;"><input type="submit" name="Sub" value="Book" class="button"></td>

  </tr>
</tr>
							</table>
								<!--*************************************
            Date1 &nbsp; <input type="datetime-local" name="ST"><br>
						Date2 &nbsp; <input type="datetime-local" name="ET"><br>
							title &nbsp; <input type="text" name="title"><br>


            Street &nbsp; <input type="text" name="Street"><br>

            City &nbsp; <input type="text" name="City"><br>
            Gov &nbsp; <input type="text" name="Gov"><br>
            Payment &nbsp;Visa <input type="radio" name="Payment" value="Visa"><br>
             &nbsp;Cash <input type="radio" name="Payment" value="Cash"><br>
                 <input type="submit" name="Sub" value="Book" >-->
            </form>
					</div>
				</div>
			</div>
		</div>
</body>

</html>
