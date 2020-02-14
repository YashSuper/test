<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADMIN PANEL</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="../css/blog.css" rel="stylesheet" >
  </head>
  <body class="container">
    <a class="float-right" href="../index.php">Home</a>
    <?php
include ('dbconnector.php');
 $time = $_GET['time'];
 mysqli_select_db($con, 'blog');
 $q = "select * from blog where time ='$time'";
 $res = mysqli_query($con, $q);
 $temp = mysqli_fetch_array($res);
 echo " <div  style='background:url(../" . $temp['image'] . ");background-size:cover;background-position:center;height:500px'></div>";
 echo "<div class=' title border border-secondary'><h1 class='text-center'>".$temp['Title']."</h1></div>";
 echo "<h5>".$temp['Des']."</h5>";

?>
</body>
</html>
