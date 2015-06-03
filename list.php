<table>
	<?php
    /* Popola la lista degli studenti */
	$con = mysqli_connect("localhost", "root", "", "scuola");
	if (mysqli_connect_errno())
	    printf("Connect failed: %s\n", mysqli_connect_error());
	else{
        /* Se la post di classe è settata */
		if(!isset($_POST['class'])){
			$class = 1;
			$section = 'Informatica';
		}else{
			$class = $_POST['class'];
			$section = $_POST['section'];
		}
		$res = mysqli_query($con, "SELECT id_studente , nome, cognome, classe, sezione, image 
									   						 FROM `studenti`
									   						 WHERE studenti.classe = {$class}
									   						 AND studenti.sezione = '{$section}'");
		if(mysqli_fetch_assoc($res) == ''){
			echo "<br>Non ci sono alunni in questa classe";
		}else{
            /* Riporta il puntatore al primo elemento di fetch_assoc */
			mysqli_data_seek($res,0);
			echo '<tr><td align="center">       Immagine  	</td>
						<td align="center">     Nome 		</td>
						<td align="center">		Classe      </td>
						<td align="center">		Sezione     </td>
						<td align="center">     Modifica    </td>
						<td align="right">      Elimina     </td></tr>';
			while ($user = mysqli_fetch_assoc($res)) {
				$user['image'] = $user['image'] != '' ? $user['image']: 'avatar.png';
				echo '<tr><td>
							<img src="img/' .$user['image'] . '" width="100px" height="100px"> </td><td>' . 
							$user['nome'] . ' ' . $user['cognome'] . '</td><td align="center"> ' .
							$user['classe'] . '</td><td>' .
							$user['sezione'] . "</td><td align='center'>
							<button id='btnList' onclick=\"modifStud({$user['id_studente']},'{$user['nome']}','{$user['cognome']}','{$user['classe']}','{$user['sezione']}','{$user['image']}')\"> !! </button> </td><td align='center'>
							<button id='btnList' onclick=\"deleteStud({$user['id_studente']},'{$user['image']}')\"> X </button> </td></tr>";
			};
		}	
		mysqli_free_result($res);
		mysqli_close($con);
	}
	?>
</table>