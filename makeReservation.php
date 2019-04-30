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
Leave your information here for a quick reponse:
</h1>
<br/>
<form action="makeReservation.php" method="get">
Building:<input type="text" value="Building" name="Building">
Room:<input type="text" value="Room" name="Room">
ReserveDate:<input type= "text" value="YYYY-MM-DD" name ="ReserveDate">
Start:<input type="text" value="Start" name="Start">
End:<input type= "text" value="End" name="End">

<button id="sub">Submit</button>
</form>







</form>
</div>


<?php
    
//    $Building = "";
//    $Room = "";
//    $ReserveDate = "";
//    $Start = "";
//    $End = "";

    
    
    
    $Building =$_GET["Building"];
    $Room =$_GET["Room"];
    $ReserveDate =$_GET["ReserveDate"];
    $Start =$_GET["Start"];
    $End =$_GET["End"];

    

    
    $con = mysqli_connect("localhost","root","Zaqw1234$#@!","SpaceReservation");
    
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    
    
//    if
//    (mysqli_query($con, "INSERT INTO `AllReservations` ('building', 'roomNumber', 'reserveDate', 'start_time', 'end_time') VALUES ('$Building', '$Room', '$ReserveDate', '$Start', '$End')"))
    
    $sql = sprintf("INSERT INTO `AllReservations` (`building`, `roomNumber`, `reserveDate`, `start_time`, `end_time`)
                   VALUES ('%s', '%s', '%s', '%s', '%s')"
                   , mysqli_real_escape_string( $con, $Building )
                   , mysqli_real_escape_string( $con, $Room )
                   , mysqli_real_escape_string( $con, $ReserveDate )
                   , mysqli_real_escape_string( $con, $Start )
                   , mysqli_real_escape_string( $con, $End ));
    
    mysqli_query( $con, $sql );
    
//    if(mysqli_affected_rows($mysqli) >0 ){
//        echo "Successful data insertion!";
//    }
    
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


