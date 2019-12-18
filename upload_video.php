
<!doctype html>
<html>
  <head>
    <?php
    if(isset($_POST['but_upload'])){
 
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];
 
          // Check file size
          if($_FILES["file"]["size"] == 0) {
            echo "File is too small";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
              $query = "INSERT INTO podcasts(name,location,currentuser) VALUES('".$name."','".$target_file."','". $_SESSION['username']."')";

              mysqli_query($con,$query);
              echo "Upload successfully.";
            }
          }
 
     } 
     ?>
  </head>
  <body>
    <form method="post" action="" enctype='multipart/form-data'>
      <input type='file' name='file' />
      <input type='submit' value='Upload' name='but_upload'>
    </form>

  </body>
</html>