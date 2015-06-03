<?php
session_start();
/* Se l'utente non è loggato, viene reindirizzato alla pagina di login */
if (!$_SESSION['nome'])
  header('Location: index.php');
include 'head.html';
include 'function.php';
?>
<body id="bgEdit">
	<a href="https://www.facebook.com/isisdavinci?fref=ts" id="fb-white"><i class="icon-facebook"></i></a>
    <button id="returnHome" onclick="goTo('home.php')">&xlarr;</button>
	<div id="logout"><button id="logout" onclick="goTo('index.php')">Logout</button></div>
	<div id="container2">
		<p>
		<?php 
        /* Questa funzione controlla se la form è valida */
		if(validate()){
			$con = mysqli_connect("localhost", "root", "", "scuola");
			if (mysqli_connect_errno())
			    printf("Connect failed: %s\n", mysqli_connect_error());
            /* Controlla se lo studente in inserimento esiste già o no */
			else if(isNotInDatabase($con) || $_FILES["fileToUpload"]["name"]){
				if ($_FILES["fileToUpload"]["name"]) {
					$type = 0;
					include 'uploadImage.php';
					$img = new uploadImage('img/');
					if($img->isImage() && $img->correctImage())
						$img->uploadImg($con,$type);
				}else{
                  /* Query nel caso in cui non ci sia l'immagine */
					mysqli_query($con, "UPDATE studenti 
										SET Nome = '{$_POST['name']}', Cognome = '{$_POST['surname']}', Classe = '{$_POST['class']}', Sezione = '{$_POST['section']}'
										WHERE id_studente = {$_GET['id']}");
					echo 'Utente ' . $_POST['name'] . ' ' . $_POST['surname'] . ' modificato con successo';
				}
				mysqli_close($con);	
			}else
				echo 'Questo utente è gia nel database !!!';
		}else
			echo "C'è stato un errore nell'inserimento";
		?>
		</p> 
	</div>
</body>
