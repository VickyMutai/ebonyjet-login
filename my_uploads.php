<?php 
include('functions.php');
include('config.php');
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>EBONYJET MEDIA</title>
	<link rel="stylesheet" type="text/css" href="css/style_register.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

	<div class="header">
		<p><h2 style="color: black;">MY PODCASTS</h2> <h4></h4>
		<h3><a href="profile.php" style="color: black;">My Profile</a> | <a href="profile.php?logout='1'" style="color: black;">logout</a></p></h3>

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
		<div class="container">
		<div class="row">
		<div class="col-md-4">
		<div>
		<?php
        $fetchVideos = mysqli_query($con, "SELECT * FROM my_podcast");

		while($row = mysqli_fetch_assoc($fetchVideos)){
            $current = $_SESSION['user']['username'];
			$location = $row['location'];
			$user_name = $row['user_name'];
			$logo = $row['logo'];
			$type = $row['filetype'];
                if ($current === $user_name){
					if($type === 'video'){
                    echo "<div >";
					echo "<video src='".$location."' controls width='320px' height='200px' >";
					echo "</div> <h5>Uploaded by  <strong>".$user_name."</strong></h5>";
					}else{
						echo "<div >";
						echo "<audio src='".$location."' controls>";
						echo "</div> <p>Uploaded by <strong>".$user_name."</strong></p>";
					}
                }
               
		}
		?>
    </div>
		</div></div>
		</div>
	</div>
</body>
</html>