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

  if (isset($_POST['submit'])) {
  	$image = count((array)$_FILES['file']['name']);
  	$name = $_POST['name'];
    $recipe = $_POST['text'];
    $chef = $_POST['who'];
  }
    
    $filenames = array();
    //create an array
              /*if (isset($_POST['submit'])) {

      for($i=0;$i<$image;$i++){
          $filename = $_FILES['file']['name'][$i];
          echo $filename;
            
  
          $push = array_push($filenames, $filename);
          
  	// Get image name
  	$image = $_FILES['file']['name'][$i];
  	// Get text
      echo $image;
  	// image file directory
  	$target = "images/".basename($image);

  	if(move_uploaded_file($filename,$target) ) {
  		$msg = "Image uploaded successfully";
        echo $msg;
  	}else{
  		$msg = "Failed to upload image";
        echo $msg;
  	}
  }
 }*/
      if(isset($_POST['submit'])){
 // Count total files
 $countfiles = count($_FILES['file']['name']);
 
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['file']['name'][$i];
   
   // Upload file
   move_uploaded_file($_FILES['file']['tmp_name'][$i],'images/'.$filename);
    
 }
} 
      
    $db = mysqli_connect("localhost","root","gue55me", "dish");

    //mysqli_query($db, "INSERT INTO images (pic, text, ID) VALUES ('$recipe', '$name', NULL)");
  
  	//$target = "images/".basename($image);

    //$filenames2 = implode($filenames);
  	$sql = "INSERT INTO images (pic, text, ID, name) VALUES ('$recipe', '$name', NULL, '$chef')";
    
      	mysqli_query($db, $sql);

    if ($db->query($sql) === TRUE) {
    $imageid = $db->insert_id; //gives the last inserted id
}
    //$sql2 = "INSERT INTO pictures (picture, ID, image_id) VALUES ('$filenames2', NULL, '$imageid')";
            //echo $imageid;
          //$img_dir = 'images/'.$_FILES['file']['name'][$i];

    
    foreach ($filenames as $val){ 
        
        $sql2 = "INSERT INTO pictures (image_id, img_blob) VALUES ('$imageid','$val')";
        mysqli_query($db, $sql2);
        //echo $targetimage;
    }
    
    // delete it from images folder after upload is done
  	$query = "SELECT * FROM pictures";
    //echo $query;
    //WHERE image_id = '$num'
  $result = mysqli_query($db, $query);
    //echo $result;
    //$rows = mysqli_fetch_array($result);
    //echo $rows;
    while ($row = mysqli_fetch_array($result)) {
     /*echo $rows['img_blob'];
      echo "<div id='img_div'>";
      	echo "<img width='500' height='400' src='images/".$rows['img_blob']."'>";
      echo "</div>";  */
        echo "<div id='img_div'>";
      	echo "<img src='images/".$row['img_blob']."' >";
      echo "</div>";
    }

  	
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