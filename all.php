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
</html>
    
<?php
//include 'find.php';

$connect = mysqli_connect("localhost","root","gue55me", "dish");
//$search = $_POST['person'];

$find = "SELECT * FROM images";
$result = mysqli_query($connect, $find);
$row1 = mysqli_num_rows($result);

echo "<table style='border: solid 1px black;'>";

if ($row1 > 0) {
    echo "<table><tr><th>Recipe</th><th>Name</th><th>ID</th></tr>";
    

    while($row = $result->fetch_assoc()) {
        $recipename=$row['pic'];
        $id = $row['ID'];
        $name = $row['text'];
        echo "<tr><td>" . $recipename. "</td> <td><div id='recipe_div'>" . "<a id=$id href='display.php?id=$id'>$name</a>". "</td><td>". $id . "</div></td></tr>"; 
    } 
    echo "</table>";
}else {
    echo "0 results";
}

    
$connect->close();
?>
    <html><form method="post" action="form1.html">
    <button type="submit" class="btn">Take me back!</button>
        </form></html>
    
<!--<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

<script type="text/javascript"> 
    $(document).ready(function(){
    $('#recipe_div a').click(function(){
        var selected_recipe_id = $(this).attr("id");
        alert(selected_recipe_id);         
    });
});
</script> 
    -->
    
