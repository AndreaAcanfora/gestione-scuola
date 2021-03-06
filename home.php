<?php
session_start();
/* Se l'utente non è loggato, viene reindirizzato alla pagina di login */
if (!$_SESSION['nome']) 
  header('Location: index.php');
?>
<!DOCTYPE html>
<html>
 
 <!-- Lista degli studenti divisi per classe e sezione -->
  <?php include 'head.html';?>
  <body id="bgHome">
      <a href="https://www.facebook.com/isisdavinci?fref=ts" id="fb-white"><i class="icon-facebook"></i></a>
      <button id="logout" onclick="goTo('index.php')">Logout</button><br><br>
      <center id="nameUsr"><?php echo "{$_SESSION['nome']}<br>";?></center>
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
          <?php include 'list.php';?>
        </center>
      </div>
  </body>
</html>

