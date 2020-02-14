<?php
session_start();
if(isset($_SESSION['user'])){
  header ('location: ADMINPANEL.php');
}
if (isset ($_POST['user'])) {

  if($_POST['user'] == 'yash' && $_POST['pass'] == 'yash') {
    $_SESSION['user'] = 'yash';
    header ('location: ADMINPANEL.php');
  }
  else{
    echo "<h1 style='color:white;'>Inccorect username or password</h1>";
  }

}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin page</title>
    <link rel="stylesheet" href="css/adminstyle.css">
  </head>
  <body>
    <div class="login">
      <div class="login-triangle"></div>

      <h2 class="login-header">Log in</h2>

      <form class="login-container" method="POST" action=<?php  echo $_SERVER['PHP_SELF']; ?>>
        <p><input type="text" name='user' placeholder="username"></p>
        <p><input type="password" name='pass' placeholder="Password"></p>
        <p><input type="submit" value="Log in"></p>
      </form>
    </div>

  </body>

</html>
