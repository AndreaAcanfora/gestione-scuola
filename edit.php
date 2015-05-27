<?php
session_start();
if (!$_SESSION['nome'] || !$_POST['name'])
  header('Location: index.php');
include 'head.php';
include 'function.php';
?>
<body id="bgEdit">
	<a href="https://www.facebook.com/isisdavinci?fref=ts" id="fb-white"><i class="icon-facebook"></i></a>
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
				if ($_FILES["fileToUpload"]["name"]) {
					include 'uploadImage.php';
					mysqli_query($con, "UPDATE studenti 
										SET Nome = '{$_POST['name']}', Cognome = '{$_POST['surname']}', Classe = '{$_POST['class']}', Sezione = '{$_POST['section']}', image = '{$_FILES['fileToUpload']['name']}'
										WHERE id_studente = {$_GET['id']}");
				}else{
					mysqli_query($con, "UPDATE studenti 
										SET Nome = '{$_POST['name']}', Cognome = '{$_POST['surname']}', Classe = '{$_POST['class']}', Sezione = '{$_POST['section']}'
										WHERE id_studente = {$_GET['id']}");
				}
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
