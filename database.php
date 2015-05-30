<?php
session_start();
if (!$_SESSION['nome']) 
  header('Location: index.php');
include 'head.php';
include 'function.php';
?>
<body id="bgDB">
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
				if($_FILES['fileToUpload']['name']){
					$type = 1;
					include 'uploadImage.php';
					$img = new uploadImage('img/');
					if($img->isImage() && $img->correctImage())
						$img->uploadImg($con,$type);
				}else{
					mysqli_query($con, "INSERT INTO `studenti`(`Nome`, `Cognome`, `Classe`, `Sezione`, `image`) 
                                    	VALUES ('{$_POST['name']}','{$_POST['surname']}','{$_POST['class']}','{$_POST['section']}','{$_FILES['fileToUpload']['name']}')");
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

