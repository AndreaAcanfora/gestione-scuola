<table>
	<?php
	$con = mysqli_connect("localhost", "root", "", "scuola");
	if (mysqli_connect_errno())
	    printf("Connect failed: %s\n", mysqli_connect_error());
	else{
		if(!isset($_POST['class'])){
			$class = 1;
			$section = 'Informatica';
		}else{
			$class = $_POST['class'];
			$section = $_POST['section'];
		}
		$res = mysqli_query($con, "SELECT id_studente , nome, cognome, classe, sezione 
									   						 FROM `studenti`
									   						 WHERE studenti.classe = {$class}
									   						 AND studenti.sezione = '{$section}'");
		echo '<tr><td align="center"> Immagine  </td>
					<td align="center">     Nome </td>
					<td align="center">			Classe </td>
					<td align="center">			Sezione</td>
					<td align="right">      Elimina </td></tr>';
		while ($user = mysqli_fetch_assoc($res)) {
			$id_studente = $user['id_studente'];
			echo '<tr><td>
						<img src="img/avatar.png" width="100px" height="100px"> </td><td>' . 
						$user['nome'] . ' ' . $user['cognome'] . '</td><td align="center"> ' .
						$user['classe'] . '</td><td>' .
						$user['sezione'] . "</td><td align='center'>
						<button id='btnList' onclick=\"deleteStud({$id_studente})\"> X </button>". '</td></tr>';
		};
		mysqli_free_result($res);
		mysqli_close($con);
	}
	?>
</table>
