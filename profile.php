<?php 
	include('config.php');
	include('functions.php');
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		echo '<script>alert("You must login first")</script>';				
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>EBONYJET MEDIA</title>
	<link rel="stylesheet" type="text/css" href="css/style_register.css">
	<?php
	include("config.php");
	$user_name = $_SESSION['user']['username'];
 
    if(isset($_POST['but_upload'])){
       $maxsize = 524288000; // 500MB
	   $name = $_FILES['file']['name'];
	   $logo = $_FILES['logo']['name'];
	   $target_dir = "videos/";
	   $logo_dir = "logo/";
	   $logo_file = $logo_dir . $_FILES["logo"]["name"];
	   $target_file = $target_dir . $_FILES["file"]["name"];
	   $filetype = $_POST['filetype'];
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 500MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file) && move_uploaded_file($_FILES['logo']['tmp_name'],$logo_file)){
              // Insert record
              $query = "INSERT INTO my_podcast(name,logo,filetype,location,user_name) VALUES('".$name."','".$logo_file."','".$filetype."','".$target_file."','".$user_name."')";
              mysqli_query($con,$query);
			  echo '<script>alert("Upload successful")</script>';				
            } else{
				echo '<script>alert("Upload not successful")</script>';
			}
          }
     } 
     ?>
</head>
<body>
	<div class="header">
		<h2>EBONYJET MEDIA</h2>
		<br><br>
		<h3><a href="my_uploads.php" style="color: white;text-decoration: none;">MY PODCASTS</a> | <a href="index.php?logout='1'" style="text-decoration: none;color: white;">logout</a></h3>
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
	<fieldset style="margin-top: 20px;">
	<legend style="margin-bottom: 20px;">Upload Podcast</legend>
	<div id="row" style="margin-left: 30px;" >
	<p>
	<label>File Type: </label>
	<select id ="filetype" name="filetype" style="margin-left: 30px; margin-bottom: 20px;">
	   <option value="audio" >Audio</option>
	   <option value="video">Video</option>
	</select>
	</p>
	<p><label for="logo"  style="font-size:20px;">Select Logo:</label>&nbsp;&nbsp;<input type='file' name='logo' class="hidden"/></p>
	<br>
	<p><label for="file"  style="font-size:20px;">Upload podcast here:</label>&nbsp;&nbsp;<input type='file' name='file' class="hidden"/></p>
	<input class="btn btn-info" type='submit' value='Upload' name='but_upload' style="margin-top: 25px; margin-bottom: 30px;">
	</div>
	</fieldset>
    </form>	
	</div>
</body>
</html>