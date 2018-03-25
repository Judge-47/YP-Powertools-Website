<?php 

require_once '../config.php';

if(isset($_SESSION['role'])){

	if($_SESSION['role'] == "user"){

		require_once INCLUDES . 'header.inc.php';

		require_once INCLUDES . 'navbar.inc.php';
?>

<div class="container">
	<div class="row">
		<div class="col-md-6" id="profile-transbox" style="margin-top: 20px;">
			<h2 style="margin-left: 90px;">User's Profile</h2>	

			<?php if($_SESSION['profile_image'] != NULL): ?>
				<img style="margin-left: 35px;" src="../images/profile_images/<?php echo $_SESSION['profile_image'] ?>" alt="userimage" id="profile-image">
			<?php else: ?>
				<img style="margin-left: 35px;" src="../images/profile_images/sample-user.png" alt="userimage" id="profile-image">
			<?php endif ?>

			<br />
			<label for="uploading">Change Profile Picture:</label>
			<br />

			<form action="../includes/scripts/upload_user_image.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="profile_image" accept="image/*" class="btn btn-primary">
				<input type="submit" name="upload" value="Upload" class="btn btn-success">
			</form>
			
			<br />
			<label for="email">Email:</label>
			<p><?php echo $_SESSION['email'] ?></p>
			
			<label for="city">City:</label>
			<p><?php echo $_SESSION['city']?></p>

			<label for="fulladdress">Address:</label>
			<p><?php echo $_SESSION['full_address']?></p>
		</div>
	</div>
</div>

<?php 

		require_once INCLUDES . 'endtags.inc.php';
	} else {
		header("Location: index.php");
		exit();
	}
} else {
	header("Location: index.php");
	exit();
}

?>