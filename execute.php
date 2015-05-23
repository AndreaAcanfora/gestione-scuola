<?php
$con = mysqli_connect("localhost", "root", "", "scuola");
if (mysqli_connect_errno())
    printf("Connect failed: %s\n", mysqli_connect_error());
$pss =  base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256,
        md5( 'qJB0rGtIn5UB1xG03efyCp' ),
        $_POST['password'] ,
        MCRYPT_MODE_CBC,
        md5( md5( 'qJB0rGtIn5UB1xG03efyCp' ) ) ) );
$res = mysqli_query($con, "SELECT * FROM `admin` a  WHERE a.user = '{$_POST['name']}' AND a.password = '{$pss}'");
$user = mysqli_fetch_assoc($res);
mysqli_free_result($res);
mysqli_close($con);
if(!is_null($user)){
    session_start();
    $_SESSION['nome'] = $_POST['name'];
    header('Location: home.php');
}
include 'head.php';
?>
<body>
    <div id="container2">  
        <center>
            <div id="result">Password errata</div>
        </center> 
    </div>
</body>
