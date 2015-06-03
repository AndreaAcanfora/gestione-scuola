<!DOCTYPE html>
<html>
 <!-- Form inserimento admin -->
  <?php include 'head.html';?>
  <body id="bgHome">
    <button id="returnHome" onclick="goTo('index.php')">&xlarr;</button>
    <form  method="POST" action="exeInsertAdmin.php" id="container2" class="insA">
        <div id="container">
            INSERT ADMIN
            <input type="text" name="name" id="name" placeholder="Name"><br>
            <input type="text" name="surname" id="surname" placeholder="Surname"><br>
            <input type="text" name="id" id="id" placeholder="Username"><br>
            <input type="password" name="pss" id="pss" placeholder="Password"><br>
            <input type="password" name="pss2" id="pss2" placeholder="Repete Password"><br>
            <input type="text" name="key" id="key" placeholder="secure key"><br>
            <button id="link" type="submit">INSERT</button>
        </div>
    </form>
  </body>
</html>
