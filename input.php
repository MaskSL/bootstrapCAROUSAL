


<?php
	//  Connect to database

require_once('init.php');

	//  check to see if the form has been sumitted
  if(isset($_POST['submit']))
{
	$filetmp = $_FILES["file"]["tmp_name"];
	$filename = $_FILES["file"]["name"];

  $name = $_POST['caption'];
	$filepath = "img/".$filename;

	move_uploaded_file($filetmp,$filepath);

	$sql = "INSERT INTO slide_show_images (img_name,caption) VALUES ('$filepath','$name')";
	$result = $mysqli->query($sql);
  echo"Inserted sucessfully <br><br>";


}

?>

<!-- INPUT FILE -->
<form method="post" enctype="multipart/form-data">
	<input type="file" name="file" id="file" required="required" /><br><br>
	<input type="text" name="caption" id="caption" placeholder="Figure Caption" /><br><br>
	<input type="submit" id="submit" name="submit" value="Submit" />
</form>
<br>
<!-- SHOWING ALL -->
<table border="1" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Path</th>
            <th>Name</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM slide_show_images";
        $result = ($mysqli->query($sql));

        if($result) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['img_id']."</td>
                    <td>".$row['img_name']."</td>
                    <td>".$row['caption']."</td>
                    <td>
                        <a href='remove.php?id=".$row['img_id']."'><button type='button'>Remove</button></a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
        }
        ?>
    </tbody>
</table>




<a href="index.php">Go back</a>
