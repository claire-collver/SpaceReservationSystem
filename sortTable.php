<!DOCTYPE html>


<html>
<head>
<script src="sorttable.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

#myInputBarcode {
    background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
}
#myInputAvailability {
background-image: url('/css/searchicon.png');
background-position: 10px 10px;
background-repeat: no-repeat;
width: 100%;
font-size: 16px;
padding: 12px 20px 12px 40px;
border: 1px solid #ddd;
margin-bottom: 12px;
}


table {
    border-collapse: collapse;
width: 100%;
}

th, td {
    text-align: left;
padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
    
    th {
        background-color: #A80000 ;
    color: white;
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
</style>
</head>
<body>





<table id="myTable">
<table class="sortable">
<th style="width:60%;">Bulding</th>
<th style="width:40%;">Room Number</th>
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
    
    $cursor = mysqli_query($con,"SELECT * FROM Rooms");
    
    
    
    while($row = mysqli_fetch_array($cursor))
    {
        echo "<tr>";
        echo '<td> <a href="reserveTableLimited.php?building=' . urlencode($row['building']) .
        '">' . $row['building'] . '</a> </td>';
        echo '<td> <a href="instantOccupy.php?room=' . urlencode($row['roomNumber']) .
        '">' . $row['roomNumber'] . '</a> </td>';
        echo "<td>" . $row['currAvailability'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    mysqli_close($con);
    ?>

</table>

<form action="checkOccupancy.php">
<button id="sub" class= "button3 button">Filter Table</button>
</form>
<form action="index.php">
<button id="sub" class= "button3 button">Back</button>
</form>


</body>
</html>

