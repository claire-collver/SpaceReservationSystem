<!DOCTYPE html>


<html>
<head>
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
</style>
</head>
<body>




<input type="text" id="myInputBarcode" onkeyup="myFunction()" placeholder="Search for building.." title="Type in a barcode">

<table id="myTable">
<tr class="sortable">
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
        echo "<td>" . $row['building'] . "</td>";
        echo "<td>" . $row['roomNumber'] . "</td>";
        echo "<td>" . $row['currAvailability'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    mysqli_close($con);
    ?>

</table>


    
<script>
    function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputBarcode");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        } else {
        tr[i].style.display = "none";
        }
    }
}
}
</script>
</body>
</html>

