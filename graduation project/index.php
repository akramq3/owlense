<?php
ini_set('SMTP','localhost');
ini_set('smtp_port',25);
$mail="akramsaber30@gmail.com";
$to_mail=$mail;
$name="akramsaber30";
for($i=0 ; $i<strlen($mail) ; $i++)
{
   if($mail[$i]!='@')
   {
   	$name.=$mail[$i];
   }
   else
   {
   	break;
   }
}
$verification = 118319 ;
$subject="hello " . $name . " this email from owlense  website!";
$body="we thank you for registration our verification code is : $verification";

mail($to_mail , $subject , $body);

include 'connect.php';

session_start();
$ID=0;

/* this code for sign up
*/

$_SESSION['success'] = "";

   if (isset($_POST['Sub'])) {
       $User_email= $_POST['User_email'];
       $User_password=$_POST['User_password'];
       $User_Fname=$_POST['User_Fname'];
       $User_Lname=$_POST['User_Lname'];
       $User_Minit=$_POST['User_Minit'];
       $User_street =$_POST['User_street'];
       $User_city= $_POST['User_city'];
       $User_gov =$_POST['User_gov'];
       $User_phone =$_POST['User_phone'];
       $User_age =$_POST['User_age'];
       $confirm_password =$_POST['confirm_password'];
       $radioVal = $_POST["gender"];
         $verification_code = $_POST["verification_code"];




       $strong =false;
        //$_SESSION['Email'] = $User_email;

$hashed = password_hash($User_password,PASSWORD_BCRYPT);

$number = preg_match('@[0-9]@', $User_password);
$uppercase = preg_match('@[A-Z]@', $User_password);
$lowercase = preg_match('@[a-z]@', $User_password);
$specialChars = preg_match('@[^\w]@',$User_password);

if(strlen($User_password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
	$strong==false;
}
       else
           $strong=true;

                        if($radioVal == "First")
                        {
                            $User_type="Client";                       }
                        else if ($radioVal == "Second")
                        {
                           $User_type="Photographer";
                        }

          $select = mysqli_query($conn, "SELECT * FROM photoshoot.user WHERE User_email = '".$User_email."'");
if(mysqli_num_rows($select)) {
  if($User_password != $confirm_password) {
                  echo '<script>alert("Password and Confirm Password does not match")</script>';
  }
   echo '<script>alert("Email has been added before")</script>';
}
        else if($User_password != $confirm_password) {
               echo '<script>alert("Password and Confirm Password does not match")</script>';
        }
       else if($strong==false)
       {
          echo '<script>alert("it is not strong")</script>';
       }
       else
       {
         $hashed = password_hash($User_password,PASSWORD_DEFAULT);
        $insert= "insert into photoshoot.user values('$User_email','$hashed','$User_Fname','$User_Lname','$User_Minit','$User_street','$User_city','$User_gov','$User_phone','$User_type' ,'$User_age')";
               if($verification_code == $verification)
               {

                         echo '<script>alert("success Verify")</script>';
                 $sql = "INSERT INTO verification VALUES('$ID','$User_email','$verification_code')";
                        $ID++;
                      $result  = mysqli_query($conn, $sql);

               }
               else
               {

                   echo '<script>alert("Please Verify")</script>';
               }
        $result2=mysqli_query($conn,$insert);

        $_SESSION['Email'] = $User_email;

     }
   }
/* this code of verification */




/* this code of sign in*/

$_SESSION['success'] = "";

if (isset($_POST['login'])) {
    $uname=$_POST["username"];
    $pw=$_POST["password"];
    $hashed = password_hash($pw,PASSWORD_BCRYPT);
   $R="SAd";
    $sql="SELECT User_password FROM `user` WHERE User_email='"."$uname"."'";
       $res=$conn->query($sql);
                while($row=$res->fetch_assoc()){
                $R=$row["User_password"];
                }

    $result=mysqli_query($conn,"select * from photoshoot.user where User_email='".$uname."'and User_password='".$pw."' limit 1");

   $query1="SELECT * FROM `user` WHERE User_email='".$uname."'";


// the password_hash function will encrypt the password into a 60 character string
if (password_verify($pw, $R)) {
    {if (mysqli_num_rows($result) == 1)

          $_SESSION['Email'] = $uname;

        if(mysqli_num_rows(mysqli_query($conn,$query1)) == 1)
        {

            header('Location: http://localhost/graduation project/home.php');
        }

    }
}
else
if (mysqli_num_rows($result) == 1)
    {
          $_SESSION['Email'] = $uname;

        if(mysqli_num_rows(mysqli_query($conn,$query1)) == 1)
        {

            header('Location: http://localhost/graduation project/home.php');
        }
    }
    else
    echo '<script>alert("Username or Password wrong")</script>';
        $msg="<p style='color:red'>"." Username or Password wrong </p>";

		// Welcome message
}
/*
   $verification_code = $_POST["verification_code"];
         // check if credentials are okay, and email is verified
         $sql = "SELECT * FROM verification WHERE verify_code = '" . $verification_code . "'";
         $result = mysqli_query($conn, $sql);


         if ($verification_code != $verification )
         {

             die("Please verify your email <a href='phpemverf.php?User_User_email=" . $User_email . "'>from here</a>");
         }

         echo "<p>Your login logic here</p>";
         exit();

*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>owlense photographing</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css login & registration form.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body >
  <form action="" method="post" id="frmLogin">
	<div class="cont"><?php if(isset($message)) { echo $message; } ?>
	<div class="form sign-in">
      <h2>Sign In</h2>

	 <label for="login"><span>Email Address</span>
 <input name="username" type="text" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" class="input-field">
</label>


	   <label for="password"><span>Password</span>
		 <input name="password" type="password" value="" class="input-field" id="myInput" >
      <input type="checkbox" onclick="myFunction()">Show Password
 </label>

    <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
   </script>




	 <button type="submit" class="submit" name="login" value="Login">Sign In</button>
   <?php  if(isset($msg)){
           echo $msg;}?>
             <p class="forgot-pass">Forgot Password ?</p>
             <div class="social-media">
               <ul>
                 <li><img src="facebook.png"></li>
                 <li><img src="twitter.png"></li>
                 <li><img src="linkedin.png"></li>
                 <li><img src="instagram.png"></li>
               </ul>
             </div>
	</div>
</form>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New to owlense?</h2>
          <form method="post">
          <p>Sign up now!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of our society?</h2>
          <p> just sign in now. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Sign Up</h2>
		<table>
			<tr>
				<td>
					<label>
					<span>First Name</span>
					<input type="text" name='User_Fname' required>
					</label>
				</td>
				<td>
					<label>
					<span>Minit Name</span>
					<input type="text" name='User_Minit' required>
					</label>
				</td>
				<td>
					<label>
					<span>Last Name</span>
					<input type="text" name='User_Lname' required>
					</label>
				</td>

			</tr>
		</table>
        <table>
			<tr>
				<td>
					<label>
					<span>street</span>
					<input type="text"name='User_street' required>
					</label>
				</td>
				<td>
					<label>
					<span>city</span>
					<input type="text" name='User_city' required>
					</label>
				</td>
				<td>
					<label>
					<span>government</span>
					<input type="text" name='User_gov' required>
					</label>
				</td>
			</tr>

		</table>
    <table>
      <tr>
        <td>
		<label>
          <span>phone number</span>
          <input type="number"name='User_phone' maxlength="11" required>
        </label>
      </td>
      <td colspan="2">
        <label>
          <span>Email</span>
          <input type="email" style="width:345px;" name='User_email' required>
             <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
        </label>
      </td>
      </tr>
      <tr>
        <td>
        <label>
          <span>Password</span>
          <input type="password"name='User_password'id='pw1' required>
             <span class="text-danger"> <?php  if(isset($mssg)){
    echo $mssg;}?></span>
        </label>
      </td>
      <td>
        <label>
          <span>Confirm Password</span>
          <input type="password" name ='confirm_password' id='pw2'required>
              <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
        </label>
      </td>
      <td>
        <label>
          <span>Age</span>
          <input type="number" min = "18" max = "50" name ='User_age' id='User_age'required>

        </label>
      </td>
      </tr>
      </table>
      <br>
      <div class="divrad">
        <table class="tablecontroler">
          <tr class="trtr">
            <td >
            <label class = "lbllbl"> <span class="tdwho">who are you?</span></label >

          </td>
                <td>

                <input  type="radio" name="gender" class="radios1" name='User_type' value='First'/required>

                <label class = "radiolbl1">Client</label>
               </td>
               <td>
                <input  type="radio" name="gender" class="radios2" value='Second'/ required>

                <label class = "radiolbl2">Photographer</label>

              </td>

             </tr>
             <tr>
             <td colspan="2" style="text-align: center;">
               <input  type="text" name="verification_code" placeholder="Enter verification code" required />
             </td>
             </tr>
          </table>
<br></br>
          <input type="submit" name="Sub" value="Sign Up Now" onclick="f1();">
            </form>
            <br></br>



        </div>
      </div>
    </div>
  </div>

<script type="text/javascript" src="script.js">

           </script>


</body>
</html>
