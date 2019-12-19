<?php 
	include('config.php');
	include('functions.php');
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	if (isset($_SESSION['msg'])) { 
		echo '<script>alert("Registration Successful")</script>';
		$_SESSION['msg'] = "";
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>EBONYJET MEDIA</title>
	<link rel="stylesheet" type="text/css" href="css/style_register.css">
	<?php
    include("config.php");
 
    if(isset($_POST['but_upload'])){
       $maxsize = 524288000; // 500MB
 
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","mp3","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 500MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
              $query = "INSERT INTO podcasts(podcast_name,location) VALUES('".$name."','".$target_file."')";

              mysqli_query($con,$query);
              echo "Upload successfully.";
            }
          }

       }else{
          echo "Invalid file extension.";
       }
 
     } 
     ?>
</head>
<body>
	<div class="header">
		<h2>EBONYJET MEDIA</h2>
		<h3><a href="index.php?logout='1'" style="color: white;">logout</a></h3>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<p> Welcome back <strong><?php echo $_SESSION['user']['username']; ?></strong></p>
				<?php endif ?>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container">
	<form method="post" action="" enctype='multipart/form-data'>
	<p><b>Upload your podcast here!</b></p>
	<p style="font-size:40px;">
      <input type='file' name='file' />
	  <br>
      <input class="btn btn-info" type='submit' value='Upload' name='but_upload'>
	  </p>
    </form>	
	</div>
</body>
</html>