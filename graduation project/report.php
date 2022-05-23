<html>
<title>report</title>
<body>

		<?php
    session_start();
$ID=0;
	include 'connect.php';
    if (isset($_SESSION['Email']))
    $Client_User_User_email= $_SESSION['Email'];
				 if (isset($_POST['Sub'])) {

									$report_complaint=$_POST['report_complaint'];




      $insert= "INSERT INTO photoshoot.report  VALUES ('$ID','$report_complaint', '$Client_User_User_email')" ;
      $ID++;


      $result2=mysqli_query($conn,$insert);

						}
    ?>


<div class="main">
	<div class="navbar">
		<div class="icon">
			<h2 class="logo">Owlense</h2>
		</div>

		<div class="menu">
			<ul>
				<li>
					<a href="http://localhost/graduation project/home.php">HOME</a>
				</li>
				<li>
					<a
						href="http://localhost/graduation project/categories/categories_page.php"
						>CATEGORIES</a
					>
				</li>
				<li>
					<a
						href="http://localhost/graduation project/login form & registration.php"
						>LOGIN</a
					>
				</li>
				<li>
					<a
						href="http://localhost/graduation project/login form & registration.php"
						>REGISTRAION</a
					>
				</li>
				<li>
					<a href="http://localhost/graduation project/ABOUT.php">ABOUT</a>
				</li>
			</ul>
		</div>

		<div class="search">
			<input
				class="srch"
				type="search"
				name=""
				placeholder="Search a photograher"
			/>
			<a href="#"> <button class="btn">Search</button></a>
		</div>
	</div>

				<div>
					<form method="post" class="form">
							<table style="width: 100;">

							<td><div class="inpbox">
									report  : <input type="text" placeholder="Enter your report" name="report_complaint">
							</div></td></tr>

							<tr><td colspan="2" style="text-align: center;"><input type="submit" name="Sub" value="give a complaint" class="button"></td></tr>
					</table>
					</form>
					  </div>
			</div>



</body>

</html>
