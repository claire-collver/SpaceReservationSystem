<!DOCTYPE html>




<html>
<head>


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
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

.button1 {
    background-color: #000000;
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


<center><font face = "Helvetica" size = "10">Click on the desired room</font><br /></center>



<table id="myTable" cellspacing="1">
<thead>
<tr class="header">
<th style="width:60%;">Building</th>
<th style="width:40%;">Room</th>
<th style="width:60%;">Availability</th>
</thead>

</tr>
<tr>



<?php
    $con = mysqli_connect("localhost","root","Zaqw1234$#@!","SpaceReservation");
    
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    
    
    $cursor = mysqli_query($con,"SELECT * FROM Rooms");
    
    
    
    while($row = mysqli_fetch_array($cursor))
    {
        echo "<tr>";
        echo "<td>" . $row['building'] . "</td>";
        echo "<td>" . $row['roomNumber'] . "</td>";
        echo "<td>" . $row['currAvailability'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    mysqli_close($con);
    ?>


</table>

<section id="mid_section">
<div id="boxes">

<form action="reserveTable.php?hello=true" method="get">
Building:<input id = "Building" type="text" value="" name="Building">
Room:<input id= "Room" type="text" value="" name="Room">
Date:<input type="text" value="YYYY-MM-DD" name="ReserveDate">
Start:<input type="text" value="Start" name="Start">
End:<input type= "text" value="End" name="End">
<button id="sub" class= "button3 button">Submit</button>
</form>
</div>

<?php
    
    
    error_reporting(E_ERROR | E_PARSE);
    
    
    
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
    
    
    $sql = sprintf("INSERT INTO `AllReservations` (`building`, `roomNumber`, `reserveDate`, `start_time`, `end_time`) VALUES ('%s', '%s', '%s', '%s', '%s')"
                   , mysqli_real_escape_string( $con, $Building )
                   , mysqli_real_escape_string( $con, $Room )
                   , mysqli_real_escape_string( $con, $ReserveDate )
                   , mysqli_real_escape_string( $con, $Start )
                   , mysqli_real_escape_string( $con, $End ));
    
    $message = "There is an overlap, try again";
    $message1 = "Your reservation has been recorded";
    
    
    
    if ($_GET['Building'] !== null) {
        if(!mysqli_query( $con, $sql)){
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            mysqli_query( $con, $sql);
            echo "<script type='text/javascript'>alert('$message1');</script>";
        }
    }
    
    

    
    
    
    
    
    ?>


<form action="index.php" method="get">
<button id="sub" class= "button3 button1">BACK</button>
</form>


<script>

(function () {
 if (window.addEventListener) {
 window.addEventListener('load', run, false);
 } else if (window.attachEvent) {
 window.attachEvent('onload', run);
 }
 
 function run() {
 var t = document.getElementById('myTable');
 var rows = t.rows; //rows collection - https://developer.mozilla.org/en-US/docs/Web/API/HTMLTableElement
 for (var i=0; i<rows.length; i++) {
 rows[i].onclick = function (event) {
 //event = event || window.event; // for IE8 backward compatibility
 //console.log(event, this, this.outerHTML);
 if (this.parentNode.nodeName == 'THEAD') {
 return;
 }
 var cells = this.cells; //cells collection
 var f1 = document.getElementById('Building');
 var f2 = document.getElementById('Room');

 f1.value = cells[0].innerHTML;
 f2.value = cells[1].innerHTML;
 
 };
 }
 }
 })();



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



