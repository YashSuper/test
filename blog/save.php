<?php
  // Database connector file.
  include ('dbconnector.php');

  //Setting up variables.
  $title = $_POST['title'];
  $time = time();
  $description = $_POST['des'];
  $img = $_FILES['pic']['name'];
  $tmp_img = $_FILES['pic']['tmp_name'];                      //stores the temp name of image
  $img_locate = "pic/" . $imgb g;                                   //locate the image in the folder
  move_uploaded_file($tmp_img,$img_locate);                     //store the address of image into tmp_img
  mysqli_select_db($con, 'blog');
  $q = "insert into blog values ('$title', '$description', '$img_locate', '$time')";
  if (mysqli_query($con,$q)) {
    header('location: index.php');
}


?>
