<?php
$con = mysqli_connect("localhost", "root", "", "scuola");
if (mysqli_connect_errno())
    printf("Connection failed: %s\n", mysqli_connect_error());
$res = mysqli_query($con, "SELECT a.login 
                           FROM `admin` a
                           WHERE 1");
$user = mysqli_fetch_assoc($res);
mysqli_free_result($res);
mysqli_close($con);
if($user['login'] != true || $_POST['name'] == ''){
    header('Location: index.php');
}
include 'head.php';
?>
<body>
	<a href="https://www.facebook.com/isisdavinci?fref=ts" ><i class="icon-facebook"></i></a>
    <button id="returnHome" onclick="goTo('home.php')"><i class="arrow-left"></i></button>
	<div id="logout"><button id="logout" onclick="goTo('index.php')">Logout</button></div>
	<div id="container2">
		<p>
		<?php 
		if(validate()){
			$con = mysqli_connect("localhost", "root", "", "scuola");
			if (mysqli_connect_errno())
			    printf("Connect failed: %s\n", mysqli_connect_error());
			else if(isNotInDatabase($con)){
				mysqli_query($con, "INSERT INTO `studenti`(`Nome`, `Cognome`, `Classe`, `Sezione`) 
									VALUES ('{$_POST['name']}','{$_POST['surname']}','{$_POST['class']}','{$_POST['section']}')");
				mysqli_close($con);
				echo 'Utente ' . $_POST['name'] . ' ' . $_POST['surname'] . ' inserito con successo';
			}else
				echo 'Questo utente è gia nel database !!!';
		}else
			echo "C'è stato un errore nell'inserimento";
		?>
		</p> 
	</div>
</body>
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
  							   AND s.Classe = '{$_POST['class']}'");
	$user = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	return  is_null($user);
}   
?>
