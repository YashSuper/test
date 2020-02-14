<?php
session_start ();
if ($_SESSION['user']) {
  echo "
<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>ADMIN PANEL</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
  </head>
  <body class='container'><br>
    <a class='float-right' href='logout.php'>Logout</a> <br>
    <form class='form-group' action='save.php' method='post' enctype='multipart/form-data'>
      <input class='form-control' type='text' placeholder='Title' name='title'> <br>
      <input class='form-control' type='text' placeholder='Description' name='des'> <br>
      <input class='form-control' type='file' name='pic'> <br>
      <input type='submit' class='form-control' value='Publish'>
    </form>

  </body>
</html> ";

}
else {
  header('location: admin.php');
}
