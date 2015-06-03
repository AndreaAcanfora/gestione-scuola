<?php
/* Questa funzione elimina uno studente dal database e la sua relativa foto dal server*/

if (!unlink($_GET['image']))
{
  echo ("Si è verificato un errore");
}
else
{
  $con = mysqli_connect("localhost", "root", "", "scuola");
  if (mysqli_connect_errno())
    printf("Connect failed: %s\n", mysqli_connect_error());
  else{
    $id = (int)$_GET['id'];
    mysqli_query($con, "DELETE FROM studenti WHERE id_studente = {$id}");
  }
  mysqli_close($con);
  header('Location: home.php');  
}

?>
