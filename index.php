<?php
$con = mysqli_connect("localhost", "root", "", "scuola");
  if (mysqli_connect_errno())
    printf("Connect failed: %s\n", mysqli_connect_error());
  mysqli_query($con, "UPDATE `admin` a 
                      SET a.login = 0 
                      WHERE 1");
  mysqli_close($con);
?>
<!DOCTYPE html>
<html>
  <?php include 'head.php';?>
  <body>
      <form  method="POST" action="execute.php" class="login">
          <div id="container">
              <input type="text" name="name" id="name" placeholder="Username"></tr><br>
              <input type="password" name="password" id="password" placeholder="Password"><br>
              <button id="link" type="submit" >LOGIN</a>
              <div id="result"></div>
          <div>
      </form>
  </body>
</html>
