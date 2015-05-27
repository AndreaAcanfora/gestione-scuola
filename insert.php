<?php
session_start();
if (!$_SESSION['nome']) 
  header('Location: index.php');
?>
<!DOCTYPE html>
<html>
  <?php include 'head.php';?>
  <body id="bgIns">
    <a href="https://www.facebook.com/isisdavinci?fref=ts" id="fb-white"><i class="icon-facebook"></i></a>
    <button id="returnHome" onclick="goTo('home.php')">&xlarr;</button>
    <button id="logout" onclick="goTo('index.php')">Logout</button>
    <form  method="POST" action="database.php" id="container2" enctype="multipart/form-data">
      <div id="container">
        <div id="titleIns">INSERIMENTO</div>
        <input type="text" name="name" id="name" placeholder="Name"><br>
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
          <div id="file2">
            <div id="testo">Select your image:</div>
            <input type="file" name="fileToUpload" id="fileToUpload">
          </div>
        </center>
        <button id="link" type="submit">INSERT</button>
      </div>
    </form>
  </body>
</html>
