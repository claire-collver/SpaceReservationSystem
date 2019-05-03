<!DOCTYPE html>




<html>
<head>


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}





#myTable {
border-collapse: collapse;
width: 100%;
border: 1px solid #ddd;
font-size: 18px;
}

#myTable th, #myTable td {
text-align: left;
padding: 12px;
}

#myTable tr {
border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
background-color: #f1f1f1;
}



.button {
    background-color: #A80000;
border: none;
color: white;
padding: 15px 32px;
    text-align: center;
    text-decoration: none;
display: inline-block;
    font-size: 16px;
margin: 4px 2px;
cursor: pointer;
}


.button3 {width: 100%;}

</style>
</head>
<body>


<h2>ROOM</h2>




<table id="myTable">
<tr class="header">
<th style="width:60%;">Building</th>
<th style="width:40%;">Room</th>
<th style="width:60%;">Availability</th>


</tr>
<tr>



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
    
    $cursor = mysqli_query($con,"SELECT * FROM Rooms WHERE roomNumber = $room");
    
    if (!$cursor) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    
    while($row = mysqli_fetch_array($cursor))
    {
        echo "<tr>";
        echo "<td>" . $row['building'] . "</td>";
        echo '<td> <a href="instantOccupy.php?room=' . urlencode($row['roomNumber']) .
        '">' . $row['roomNumber'] . '</a> </td>';
        echo "<td>" . $row['currAvailability'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

            $sql = "UPDATE Rooms SET currAvailability= 'Reserved' WHERE roomNumber=$room";
            
            if ($con->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $con->error;
            }
            
            mysqli_close($con);
    
        
            
            
    ?>
    
    

    
    
    
    



</table>


<form action="index.php">
<button id="sub" class= "button3 button">Back</button>
</form>

<script>

</script>


</body>
</html>


