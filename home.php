<?php
$conn = mysqli_connect("localhost", "root", "", "scuola");
if (mysqli_connect_errno())
    printf("Connect failed: %s\n", mysqli_connect_error());
$res = mysqli_query($conn, "SELECT login FROM admin WHERE 1");

$user = mysqli_fetch_assoc($res);
mysqli_free_result($res);
mysqli_close($conn);
if($user['login'] != true){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
  <?php include 'head.php';?>
  <body>
      <div id="logout"><button id="logout" onclick="goTo('index.php')">Logout</button></div><br><br>
      <div id="container3">
        <center>
          <button onclick="goTo('insert.php')" id="insert">Inserimento Studente</button>
          <form method="POST" action="home.php">
          <strong id="titleHome">Lista alunni</strong>
          <select name="class" id="sectClass">
            <?php  
              for($i = 1; $i<=5;$i++) 
                echo "<option value='{$i}'>{$i}</option>";
            ?>
          </select>
          <select name="section" id="sect2">
          <?php  
            $section = array('Informatica', 'Chimica', 'Idraulica', 'Edilizia', 'Meccanica', 'Elettronica', 'Elettrotecnica');
            foreach ($section as $key => $value) 
              echo "<option value='{$value}'>{$value}</option>";
          ?>
          </select>
          <button type="submit" id="homeButton">Conferma</button>
          </form>
          <div id="list">
            <?php include 'list.php';?>
          </div>
        </center>
      </div>
  </body>
</html>

