<!DOCTYPE html>
<html>
<head>
<style>

html {
    scroll-behavior: smooth;
}

input[type=text], select {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
width: 100%;
    background-color: #C80000;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
    border-radius: 4px;
cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
padding: 20px;
}
</style>




<div>




<section id="mid_section">
<div id="boxes">
<h1>
Make Reservation:
</h1>
<br/>


<?php
  
    error_reporting(E_ERROR | E_PARSE);
    
    
    $username = 'root';
    $password = 'Zaqw1234$#@!';
    $conn = new PDO( 'mysql:host=localhost; dbname=SpaceReservation', $username, $password );
    $sql ="SELECT * FROM Rooms";
    $statement = $conn->prepare( $sql );
    $statement->execute();
    $results = $statement->fetchAll( PDO::FETCH_ASSOC );
    
    
    ?>



<select name="Room" id="Room">
<option value="Room" name="Room">Choose one</option>
<?php foreach( $results as $row ){
    echo "<option value = \"" . $Room . "\">" . $row[building] . "-" . $row[roomNumber] ."</option>";
}
    echo $Room;

    ?>
</select>


ReserveDate:<input type= "text" value="YYYY-MM-DD" name ="ReserveDate">
Start:<input type="text" value="Start" name="Start">
End:<input type= "text" value="End" name="End">

<button id="sub">Submit</button>
</form>







</form>
</div>


<?php

    
    error_reporting(E_ERROR | E_PARSE);
    
    
    
   
    $Room =$_GET["Room"];
    $pieces = explode("-", $Room);
    $Building = $pieces[0];
    $Room = $pieces[1];
    
    $ReserveDate =$_GET["ReserveDate"];
    $Start =$_GET["Start"];
    $End =$_GET["End"];
    
    
    
    
    
    $con = mysqli_connect("localhost","root","Zaqw1234$#@!","SpaceReservation");
    
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    
   
       
        $sql = sprintf("INSERT INTO `AllReservations` (`building`, `roomNumber`, `reserveDate`, `start_time`, `end_time`) VALUES ('%s', '%s', '%s', '%s', '%s')"
                       , mysqli_real_escape_string( $con, $Building )
                       , mysqli_real_escape_string( $con, $Room )
                       , mysqli_real_escape_string( $con, $ReserveDate )
                       , mysqli_real_escape_string( $con, $Start )
                       , mysqli_real_escape_string( $con, $End ));
        
        mysqli_query( $con, $sql );
   
    
   
    
    
    ?>

<script>
function myFunction() {
    $("#sub").click(function(){
                    
                    $.post($("#myform").attr("action"), $("#myform:input").serializeArray(), function(info){$("#result").html(info);});
                    });
    
    $("#myform").submit(function(){
                        return false;
                        });
}
</script>


</body>
</html>


