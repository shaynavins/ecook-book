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
    
 </head>
   
    
<?php



 
  $msg = "";

  if (isset($_POST['upload'])) {
  	$image = $_FILES['image']['name'];
  	$name = $_POST['name'];
    $recipe = $_POST['text'];

    $db = mysqli_connect("localhost","root","gue55me", "dish");

    //mysqli_query($db, "INSERT INTO images (pic, text, ID) VALUES ('$recipe', '$name', NULL)");
  
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (picture, pic, text, ID) VALUES ('$image', '$recipe', '$name', NULL)";
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
$db->close();


/*$db = mysqli_connect("localhost","root","gue55me", "dish");

  
  $msg = "";

  if (isset($_POST['upload'])) {
  	$image = $_FILES['image']['name'];

  	$target = "images/".basename($image);

  	$sql = "INSERT INTO practice (image, image_text) VALUES ('$image')";
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }*/

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
    <body>
    <center><h1>Yay! Your dish is in the database!</h1>
        <form method="post" action="form1.html">
    <button type="submit" class="btn">Take me back!</button>
            
        </form>
    </center>

</body>
</html>
