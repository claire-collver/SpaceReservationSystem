<!DOCTYPE html>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }
<?php
    $con = mysqli_connect("localhost","root","Zaqw1234$#@!","SpaceReservation");
    
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $room = $_GET["room"];
    $room = (string)$room;
    $room = strval($room);
    
  
    
       $sql = "UPDATE Rooms SET currAvailability= 'Reserved' WHERE roomNumber=$room";
    
        if ($con->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $con->error;
        }
    
        mysqli_close($con);
    ?>

</body>
</html>

