<?php
/* Questa funzione controlla se la form è valida */
function validate(){
	try{
		$result = 1;
        /* Toglie prima caratteri speciali dell'html */
		$_POST['name'] = htmlspecialchars($_POST['name']);
		$_POST['surname'] = htmlspecialchars($_POST['surname']);
        /* Controlla che non siano composti da soli spazi */
		if (trim($_POST['name']) == "" || trim($_POST['surname']) == "" || $_POST['class'] == "" || trim($_POST['section']) == "")
			$result = 0;
        /* Controlla se non è stata modificata la combo box */
		$section = array('Informatica', 'Chimica', 'Idraulica', 'Edilizia', 'Meccanica', 'Elettronica', 'Elettrotecnica');
        if (!is_int(array_search($_POST['section'], $section)))
			$result = 0;
        /* Controlla se la classe sia un intero */
		if (is_integer($_POST['class'] + 1)){
			if ($_POST['class'] < 1 || $_POST['class'] > 5)
				$result = 0;
		} else {
		  $result = 0;
		}
	} catch (Exception $e){
		echo "Errore !";
	}
	return $result;
}
/* Controlla se lo studente in inserimento esiste già o no */
function isNotInDatabase($con){
	try{
		$res = mysqli_query($con, "SELECT * 
								   FROM `studenti` s
	  							   WHERE s.Nome = '{$_POST['name']}'
	  							   AND s.Cognome = '{$_POST['surname']}'
	  							   AND s.Classe = '{$_POST['class']}'
	  							   AND s.Sezione = '{$_POST['section']}'");
		$user = mysqli_fetch_assoc($res);
		mysqli_free_result($res);
	} catch (Exception $e){
		echo "Errore !";
	}
	return  is_null($user);
}   
?>