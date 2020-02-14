<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADMIN PANEL</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body class="container">
    <a class="float-right" href="admin.php">Admin Mode</a><br><br>
<?php
if (isset($_GET['pageno']))
  {
     $pageno = $_GET['pageno'];
  }
  else
  {
     $pageno = 1;
  }
 $record_count = 10;
 $offset = ($pageno-1) * $record_count;
include ('dbconnector.php');
mysqli_select_db($con, 'blog');
$q = "select * from blog order by 'time' desc";
$res = mysqli_query($con, $q);
$total = ceil(mysqli_num_rows($res) / $record_count);
$q = "select * from blog order by time desc LIMIT $offset, $record_count ";
$res = mysqli_query($con, $q);



while($temp=mysqli_fetch_array($res)) {
  echo "<h3><a href=blog.php/?time=".$temp['time'].">".$temp['Title']."</a></h3><br>";
  $des = explode(" ", $temp['Des']);
  for ($i=0;$i<3;$i++) {
    echo $des[$i]." ";
  }
  echo "....<a href=blog.php/?time=".$temp['time'].">Read More</a><hr>";
}

       for ($i=1; $i<=$total; $i++)
       {
       echo "<a href='?pageno=".$i."'><button>".$i."</button></a>";
        }
        ?>
</body>
</html>
