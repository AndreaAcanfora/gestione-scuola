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
      <a href="https://www.facebook.com/isisdavinci?fref=ts" ><i class="icon-facebook"></i></a>
      <button id="logout" onclick="goTo('index.php')">Logout</button><br><br>
      <div id="container3">
        <center>
          <button onclick="goTo('insert.php')" id="insert">Inserimento Studente</button>
          <form method="POST" name="fList" action="home.php">
          <strong id="titleHome">Lista alunni</strong>
          <select name="class" id="sectClass" onchange="document.fList.submit();">
            <?php  
            for($i = 1; $i<=5;$i++) {
              echo "<option value='". $i ."' ";
              if (isset($_POST['class']) && $i ==  $_POST['class'])
                echo "selected";
              echo ">{$i}</option>";
            }
            ?>
          </select>
          <select name="section" id="sect2" onchange="document.fList.submit();">
          <?php  
            $section = array('Informatica', 'Chimica', 'Idraulica', 'Edilizia', 'Meccanica', 'Elettronica', 'Elettrotecnica');
            foreach ($section as $key => $value){
              echo "<option value='{$value}'";
              if (isset($_POST['section']) && $value ==  $_POST['section'])
                echo "selected";
              echo ">{$value}</option>";
            }
          ?>
          </select>
          </form>
          <div id="list">
            <?php include 'list.php';?>
          </div>
        </center>
      </div>
  </body>
</html>

