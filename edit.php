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
include 'function.php';
?>
<body>
	<a href="https://www.facebook.com/isisdavinci?fref=ts" ><i class="icon-facebook"></i></a>
    <button id="returnHome" onclick="goTo('home.php')">&xlarr;</button>
	<div id="logout"><button id="logout" onclick="goTo('index.php')">Logout</button></div>
	<div id="container2">
		<p>
		<?php 
		if(validate()){
			$con = mysqli_connect("localhost", "root", "", "scuola");
			if (mysqli_connect_errno())
			    printf("Connect failed: %s\n", mysqli_connect_error());
			else if(isNotInDatabase($con)){
				mysqli_query($con, "UPDATE studenti 
									SET Nome = '{$_POST['name']}', Cognome = '{$_POST['surname']}', Classe = '{$_POST['class']}', Sezione = '{$_POST['section']}'
									WHERE id_studente = {$_GET['id']}");
				mysqli_close($con);
				echo 'Utente ' . $_POST['name'] . ' ' . $_POST['surname'] . ' modificato con successo';
			}else
				echo 'Questo utente è gia nel database !!!';
		}else
			echo "C'è stato un errore nell'inserimento";
		?>
		</p> 
	</div>
</body>
