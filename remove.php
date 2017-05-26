<?php

session_start();
require_once 'init.php';
?>
<?php



if($_GET) {
    $id = $_GET['id'];

    $sql2 = "SELECT * FROM slide_show_images WHERE img_id = {$id}";

    $res = ($mysqli->query($sql2));
    $row = mysqli_fetch_assoc($res);
    $sql = "DELETE FROM slide_show_images WHERE img_id = {$id} ";
    if($mysqli->query($sql)) {
        unlink($row['img_name']);
        echo "<p>Successfully removed!!</p>";
        echo "<a href='input.php'><button type='button'>Back</button></a>";
    } else {
        echo "Error updating record : " . $mysqli->error;
    }

    $mysqli->close();
}

?>
