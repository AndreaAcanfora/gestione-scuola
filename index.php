<?php
session_start();
$_SESSION['nome'] = '';
?>
<!DOCTYPE html>
<html>
  <?php include 'head.php';?>
  <body id="backgroundIndex">
    <form  method="POST" action="execute.php" class="login">
      <input type="text" name="name" id="indexLogin" placeholder="Username"></tr>
      <input type="password" name="password" id="indexLogin" placeholder="Password">
      <button id="bntLogin" type="submit" >LOGIN</a></button>
      <a href="https://www.facebook.com/isisdavinci?fref=ts" id="fb"><i class="icon-facebook"></i></a>
    </form>
    <div id="containerText">
    <p>
      Benvenuto nella sezione amministrativa<br>
      dell'ISIS Leonardo Da Vinci<br>
      Da qui potrai gestire comodamente<br>
      gli alunni della scuola;<br>
      accedi all'area riservata.
    </p>
    </div>
  </body>
</html>

