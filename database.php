<?php
session_start();
/* Se l'utente non è loggato, viene reindirizzato alla pagina di login */
if (!$_SESSION['nome']) 
  header('Location: index.php');
include 'head.html';
include 'function.php';
?>
<body id="bgDB">
    <!-- Link alla pagina facebook dell'istituto -->
	<a href="https://www.facebook.com/isisdavinci?fref=ts" id="fb-white"><i class="icon-facebook"></i></a>
    <button id="returnHome" onclick="goTo('home.php')">&xlarr;</button>
	<div id="logout"><button id="logout" onclick="goTo('index.php')">Logout</button></div>
	<div id="container2">
		<p>
		<?php 
        /* Questa funzione controlla se la form è valida */
		if(validate()){
            /* Connessione al database */
			$con = mysqli_connect("localhost", "root", "", "scuola");
			if (mysqli_connect_errno())
			    printf("Connect failed: %s\n", mysqli_connect_error());
            /* Controlla se lo studente in inserimento esiste già o no */
			else if(isNotInDatabase($con)){
                /* Controllo se il campo immagine è nullo */
				if($_FILES['fileToUpload']['name']){
					$type = 1;
                    /* Esegue l'upload dell'immagine */
					include 'uploadImage.php';
					$img = new uploadImage('img/');
					if($img->isImage() && $img->correctImage())
						$img->uploadImg($con,$type);
				}else{
					mysqli_query($con, "INSERT INTO `studenti`(`Nome`, `Cognome`, `Classe`, `Sezione`, `image`) 
                                        VALUES            ('{$_POST['name']}','{$_POST['surname']}','{$_POST['class']}','{$_POST['section']}','avatar.png')");
					echo 'Utente ' . $_POST['name'] . ' ' . $_POST['surname'] . ' inserito con successo';
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

