<?php
$con = mysqli_connect("localhost", "root", "", "scuola");
	if (mysqli_connect_errno())
	    printf("Connect failed: %s\n", mysqli_connect_error());
	else{
		$id = (int)$_GET['id'];
		mysqli_query($con, "DELETE FROM studenti WHERE id_studente = {$id}");
	}
mysqli_close($con);
header('Location: home.php');
?>
