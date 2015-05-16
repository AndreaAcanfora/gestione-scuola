<table>
	<?php
	$con = mysqli_connect("localhost", "root", "", "scuola");
	if (mysqli_connect_errno())
	    printf("Connect failed: %s\n", mysqli_connect_error());
	else{
		$res = mysqli_query($con, "SELECT nome, cognome, classe, sezione 
								   FROM `studenti`");
		while ($user = mysqli_fetch_assoc($res)) {
			echo '<tr><td>
						Nome: </td><td>' . $user['nome'] . ' ' . $user['cognome'] . '</td><td>
						classe: ' . $user['classe'] . '</td><td>
						sezione: ' . $user['sezione'] . '</td></tr>';
		};
		mysqli_free_result($res);
		mysqli_close($con);
	}
	?>
</table>