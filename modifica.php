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
    <a href="https://www.facebook.com/isisdavinci?fref=ts" ><i class="icon-facebook"></i></a>
    <button id="returnHome" onclick="goTo('home.php')">&xlarr;</button>
    <button id="logout" onclick="goTo('index.php')">Logout</button>
    <form  method="POST" action=<?php echo "'edit.php?id=" . $_GET['id'] . "'";?> id="container3">
    <div id="container">
    <h1>Modifica</h1>
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
    </center>
    <button id="link" type="submit">Edit</button><br><br>
    </div>
    </form>
  </body>
</html>