<html>
<head>
    <style>
    
table, th, td {
    border: 1px solid black;
}

    body{
            background-image:url("berry.jpg");
        font-family: 'Indie Flower';font-size: 22px;
            color: cadetblue;
        }

.btn {
  background-color:aquamarine;
  border: none;
  color: black;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: aqua;
}
</style>
    <body>
    <center><h1>Yay! Your dish is in the database!</h1>
        <form action="form1.html">
    <button type="submit" class="btn">Take me back!</button>
        </form>
    </center>

</head>
    </head></body>
    
</html>
    
<?php


$name = $_POST['name'];
$recipe = $_POST['text'];

$connect = mysqli_connect("localhost","root","gue55me", "dish");
mysqli_query($connect, "INSERT INTO images VALUES ('$recipe', '$name')");


/*$search = $_POST['person'];

$find = "SELECT pic FROM images WHERE text = '$search'";
$result = mysqli_query($connect, $find);
$row1 = mysqli_num_rows($result);

echo "<table style='border: solid 1px black;'>";

if ($row1 > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['pic']. "</td> <td>" . "$search". "</td></tr>"; 
        //echo $row[0];
    } 
    echo "</table>";
}else {
    echo "0 results";
}

$connect->close();

*/
?>