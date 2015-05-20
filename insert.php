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
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
  <?php include 'head.php';?>
  <body>
      <div id="logout"><button id="logout" onclick="logout()">Logout</button></div>
      <form  method="POST" action="database.php" id="container2">
      <div id="container">
      <input type="text" name="name" id="name" placeholder="Name"></tr><br>
      <input type="text" name="surname" id="surname" placeholder="Surname"><br>
      <center>
        class: 
        <select name="class" id="sectClass">
          <?php  
            for($i = 1; $i<=5;$i++) 
              echo "<option value='{$i}'>{$i}</option>";
          ?>
        </select>
        Sezione: 
        <select name="section" id="sect">
          <?php  
            $section = array('Informatica', 'Chimica', 'Idraulica', 'Edilizia', 'Meccanica', 'Elettronica', 'Elettrotecnica');
            foreach ($section as $key => $value) 
              echo "<option value='{$value}'>{$value}</option>";
          ?>
        </select>
      </center>
      <button id="link" type="submit">INSERT</button>
      <div>
      </form>
  </body>
</html>
<script>
function logout(){
  window.location.href = 'index.php';
}
</script>
