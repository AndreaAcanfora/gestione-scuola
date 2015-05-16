<?php
$con = mysqli_connect("localhost", "root", "", "scuola");
if (mysqli_connect_errno())
    printf("Connect failed: %s\n", mysqli_connect_error());
$res = mysqli_query($con, "SELECT a.login 
                           FROM `admin` a
                           WHERE 1");
$user = mysqli_fetch_assoc($res);
mysqli_free_result($res);
mysqli_close($con);
if($user['login'] != true){
    header('Location: /php/esercizio3/index.php');
}
?>
<!DOCTYPE html>
<html>
  <?php include 'head.php';?>
  <body>
      <div id="logaut"><button id="logout" onclick="logaut()">Logout</button></div>
      <form  method="POST" action="database.php" id="container2">
      <div id="container">
      <input type="text" name="name" id="name" placeholder="Name"></tr><br>
      <input type="text" name="surname" id="surname" placeholder="Surname"><br>
      <center>
        class: 
        <select id="selectedType" name="class">
          <?php  
            for($i = 1; $i<=5;$i++) 
              echo "<option value='{$i}'>{$i}</option>";
          ?>
        </select>
      </center>
      <input type="text" name="section" id="section" placeholder="Sezione"><br>
      <button id="link" type="submit">INSERT</a>
      <div>
      </form>
  </body>
</html>
<script>
function logaut(){
  window.location.href = '/php/esercizio3/index.php';
}
</script>
