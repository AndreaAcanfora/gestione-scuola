<?php
session_start();
$_SESSION['nome'] = '';
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

