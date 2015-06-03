<?php
session_start();
/* Se l'utente non è loggato, viene reindirizzato alla pagina di login */
if (!$_SESSION['nome']) 
  header('Location: index.php');
?>
<!DOCTYPE html>
<html>
 <!-- Modifica di uno studente -->
  <?php include 'head.html';?>
  <body id="bgMod">
    <a href="https://www.facebook.com/isisdavinci?fref=ts" id="fb-white"><i class="icon-facebook"></i></a>
    <button id="returnHome" onclick="goTo('home.php')">&xlarr;</button>
    <button id="logout" onclick="goTo('index.php')">Logout</button>
    <form  method="POST" action=<?php echo "'edit.php?id=" . $_GET['id'] . "'";?> id="container3" enctype="multipart/form-data" >
      <div id="container">
        <h3>Modifica<h3>
        <input type="text" name="name" id="name" placeholder="Name" value=<?php echo "'{$_GET['nome']}'";?>><br>
        <input type="text" name="surname" id="surname" placeholder="Surname" value=<?php echo "'{$_GET['cognome']}'";?>><br>
        <center>
          class: 
          <select name="class" id="sectClass">
            <?php  
              for($i = 1; $i<=5;$i++){
                echo "<option value='{$i}' ";
                if($i == $_GET['classe'])
                	echo "selected";
            	echo ">{$i}</option>";
              }
            ?>
          </select>
          Sezione: 
          <select name="section" id="sect">
            <?php  
              $section = array('Informatica', 'Chimica', 'Idraulica', 'Edilizia', 'Meccanica', 'Elettronica', 'Elettrotecnica');
              foreach ($section as $key => $value){ 
                echo "<option value='{$value}' ";
                if($value == $_GET['sezione'])
                	echo "selected";
                echo ">{$value}</option>";
              }
            ?>
          </select>
          <div id="file2">
            <table><tr><td>
            <strong>Select your new image:</strong>
            <input type="file" name="fileToUpload" id="fileToUpload">
            </td><td align="right">
            <strong><?php 
              $name = htmlspecialchars($_GET['nome']);
              echo "{$name}'s image:";?>
            </strong><br>
            <?php echo "<img src='img/{$_GET['image']}' width='100px' height='100px' id='imgMod'>"; ?>
            </td></tr>
            </table>
          </div>
        </center>
        <button id="link" type="submit">Edit</button><br><br>
      </div>
    </form>
  </body>
</html>