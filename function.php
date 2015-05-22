<?php
function validate(){
	$result = 1;
	htmlspecialchars($_POST['name']);
	htmlspecialchars($_POST['surname']);
	if (trim($_POST['name']) == "" || trim($_POST['surname']) == "" || $_POST['class'] == "" || trim($_POST['section']) == "")
		$result = 0;
	$section = array('Informatica', 'Chimica', 'Idraulica', 'Edilizia', 'Meccanica', 'Elettronica', 'Elettrotecnica');
	if (!is_int(array_search($_POST['section'], $section)))
		$result = 0;
	if (is_integer($_POST['class'] + 1)){
		if ($_POST['class'] < 1 || $_POST['class'] > 5)
			$result = 0;
	} else {
	  $result = 0;
	}
	return $result;
}
function isNotInDatabase($con){
	$res = mysqli_query($con, "SELECT * 
							   FROM `studenti` s
  							   WHERE s.Nome = '{$_POST['name']}'
  							   AND s.Cognome = '{$_POST['surname']}'
  							   AND s.Classe = '{$_POST['class']}'
  							   AND s.Sezione = '{$_POST['section']}'");
	$user = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	return  is_null($user);
}   
?>