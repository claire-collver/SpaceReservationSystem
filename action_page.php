<!DOCTYPE html>




<html>
<head>
<body>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}
</style>

<?php
    $con = mysqli_connect("localhost","root","Zaqw1234$#@!","SpaceReservation");
    echo "<h2> Your reservation has been completed </h2>";
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $Building = 'Skata';

    $Building =$_POST['Building'];
    $Room =$_POST['Room'];
    $ReserveDate =$_POST['ReserveDate'];
    $Start =$_POST['Start'];
    $End =$_POST['End'];

 
    if
    (mysqli_query($con, "INSERT INTO `AllReservations` (`building`, `roomNumber`, `reserveDate`, `start_time`, `end_time`) VALUES ('$Building', '$Room', '$ReserveDate', '$Start', '$End')"))
    {
        echo 'Success!';
    }


//    else {
//        echo mysqli_error("Error");
//        exit;
//    }

?>
</body>
</html>


