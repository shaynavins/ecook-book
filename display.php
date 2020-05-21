
  <html>
<head>
<style>
table {
  font-family: fantasy; sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 5px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(odd) {
  background-color:silver;
}

    body{
            background-image:url("berry.jpg");
        font-family: 'Indie Flower';font-size: 22px;
            color: black;
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
    
<body>
    <span class="error"> <?php if(isset($error['name']))
echo $error['name'];?></span>
    <?php
//include 'find.php';
$num = $_GET['id'];
//echo $num;
$connect = mysqli_connect("localhost","root","gue55me", "dish");

$find = "SELECT pic, text, ID FROM images WHERE ID = '$num'";
$result = mysqli_query($connect, $find);
$row1 = mysqli_num_rows($result);

echo "<table style='border: solid 1px black;'>";

if ($row1 > 0) {
    echo "<table><tr><th>Recipe</th><th>Name</th><th>ID</th></tr>";
    

    while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["pic"] . "</td> <td>" . $row["text"]. "</td><td>" . "" . $row["ID"] . "<br></td></tr>";
        
        /*echo "<tr><td>" . $recipename. "</td> <td><div id='recipe_div'>" . "<a id=$id href='display.php?id=$id'>$search</a>". "</div></td></tr>"; */
    } 
    
}else {
  echo "0 results";
}
  $result = mysqli_query($connect, "SELECT * FROM images WHERE ID = '$num'");
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['picture']."' >";
      echo "</div>";
    }
    echo "<form method='post' action='form1.html'>";
    echo "<button type='submit' class='btn'>Take me back!</button>";
    echo "</form>";
?>
        <!--<form method="post" action="form1.html">
    <button type="submit" class="btn">Take me back!</button>
        </form>
    </html>-->

