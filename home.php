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
      <div id="logaut"><button id="logout" onclick="goTo('/php/esercizio3/index.php')">Logout</button></div><br><br>
        <div id="container3">
          <center>
            <button onclick="goTo('/php/esercizio3/insert.php')" id="insert">Inserimento Studente</button>
            <h3>Lista alunni</h3>
            <div id="list">
              <?php include 'list.php';?>
            </div>
          </center>
        <div>
  </body>
</html>
<script>
function goTo(link){
  window.location.href = link;
}
</script>
