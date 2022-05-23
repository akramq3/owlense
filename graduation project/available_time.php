<html>
    <?php
    session_start();
    include 'connect.php';


            $ID=10;

               if (isset($_SESSION['Email']))

                 $Photographer_User_User_email= $_SESSION['Email'];

if (isset($_POST['Sub'])) {

    $work_time_start=$_POST['work_time_start'];
    $work_time_end=$_POST['work_time_end'];

$mysqli3= "CALL create_date_for_year(2022, '$Photographer_User_User_email','$work_time_start','$work_time_end');";
    $ID++;
       $result2=mysqli_query($conn,$mysqli3);
}

    ?>
    <form method="POST">

        <label>Start Time </label><input type="time" name="work_time_start" required><br><br>
        <label>END Time </label><input type="time" name="work_time_end" required><br><br>

        <input type="submit" name="Sub" value="Add">
    </form>
</html>
