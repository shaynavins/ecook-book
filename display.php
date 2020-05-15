
    <?php
include 'find.php';
$num = $_GET['id'];
echo $num;
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
$connect->close();
?>
