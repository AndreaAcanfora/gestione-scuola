<?php
class upload 
{
  private $target_dir;
  private $target_file;
  protected $uploadOk;
  function __construct($dir)
  {
      $this->target_dir = $dir;
      $this->target_file = $this->target_dir . basename($_FILES["fileToUpload"]["name"]);
      $this->uploadOk = 1;
  }

  public function isImage(){
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".<br>";
          $this->uploadOk = 1;
      } else {
          echo "File is not an image.<br>";
          $this->uploadOk = 0;
      }
    }
    return $this->uploadOk;
  }

  public function exist(){
    if (file_exists($this->target_file)) {
      echo "Sorry, file already exists.<br>";
      $this->uploadOk = 0;
    }
    return $this->uploadOk;
  }

  public function sizeFile(){
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.<br>";
      $this->uploadOk = 0;
    }
    return $this->uploadOk;
  }

  protected function getTargetFile(){
    return $this->target_file;
  }
}

class uploadImage extends upload
{
  private $imageFileType;

  function __construct($dir)
  {
    parent::__construct($dir);
    $this->imageFileType = pathinfo($this->getTargetFile(),PATHINFO_EXTENSION);
  }

  public function isImage(){
    if($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg"
    && $this->imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
      $this->uploadOk = 0;
    }
    return $this->uploadOk;
  } 

  public function correctImage(){
    parent::isImage();
    parent::exist();
    parent::sizeFile();
    return $this->uploadOk;
  } 

  public function uploadImg($con,$type){
    if (!$this->uploadOk) {
      echo "Sorry, your file was not uploaded.<br>";
    } else {  
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $this->getTargetFile())) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
            if($type){
                mysqli_query($con, "INSERT INTO `studenti`(`Nome`, `Cognome`, `Classe`, `Sezione`, `image`) 
                                        VALUES ('{$_POST['name']}','{$_POST['surname']}','{$_POST['class']}','{$_POST['section']}','{$_FILES['fileToUpload']['name']}')");
                echo 'Studente ' . $_POST['name'] . ' ' . $_POST['surname'] . ' inserito con successo';
            }else{
                mysqli_query($con, "UPDATE studenti 
                                    SET Nome = '{$_POST['name']}', Cognome = '{$_POST['surname']}', Classe = '{$_POST['class']}', Sezione = '{$_POST['section']}', image = '{$_FILES['fileToUpload']['name']}'
                                    WHERE id_studente = {$_GET['id']}");
                echo 'Studente ' . $_POST['name'] . ' ' . $_POST['surname'] . ' modificato con successo';
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
  }
}
?>
