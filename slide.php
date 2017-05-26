<?php
require_once 'init.php';

$sql = "SELECT * FROM slide_show_images";
$result = ($mysqli->query($sql));
 ?>
<html>
<head>
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="js/unslider-min.js"></script>
  <link rel="stylesheet" href="css/unslider.css">
  <link rel="stylesheet" href="css/unslider-dots.css">

  <script>
  jQuery(document).ready(function($) {
    $('.my-slider').unslider();
  });
  </script>

  
</head>
<body>
  <div class="my-slider">
  	<ul>
      <?php
      while($row = mysqli_fetch_array($result)){
       ?>
  		<li><img src="<?php echo $row['img_name']; ?>"></li>
      <?php } ?>
  	</ul>
  </div>
</body>
</html>
