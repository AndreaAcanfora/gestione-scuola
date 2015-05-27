<?php
if (!$_POST['name']) 
  header('Location: index.php');
include 'head.php';
?>
<body id="bgHome">
    <button id="returnHome" onclick="goTo('index.php')">&xlarr;</button>
	<div id="container2">
		<p>
		<?php 
		if ($_POST['key'] == '12345') {
			$con = mysqli_connect("localhost", "root", "", "scuola");
			if (mysqli_connect_errno())
			    printf("Connect failed: %s\n", mysqli_connect_error());
			else if($_POST['pss'] == $_POST['pss2']){
				$pss =  base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256,
		    			md5( 'qJB0rGtIn5UB1xG03efyCp' ),
		    			$_POST['pss'] ,
		    			MCRYPT_MODE_CBC,
		    			md5( md5( 'qJB0rGtIn5UB1xG03efyCp' ) ) ) );
				mysqli_query($con, "INSERT INTO `admin`(`user`, `password`, `nome`, `cognome`) 
									VALUES ('{$_POST['id']}','{$pss}','{$_POST['name']}','{$_POST['surname']}')");
				mysqli_close($con);
				echo 'Utente ' . $_POST['name'] . ' ' . $_POST['surname'] . ' inserito con successo';
			}else{
				echo 'Le due password non coincidono !! <br>';
				echo '<button onclick="goTo(\'insertAdmin.php\')">&xlarr;</button>';
			}
		}else
			echo 'La chiave di inserimento è sbagliata <br>';
		?>
		</p> 
	</div>
</body>
