<?php
include "php/config.php";

if(isset($_GET['u'])){
$u = mysqli_real_escape_string($conn, $_GET['u']);

$sql = mysqli_query($conn, "SELECT full_url FROM url_table WHERE shorten_url = '{$u}'");

if(mysqli_num_rows($sql) > 0){
	$full_url = mysqli_fetch_array($sql);
	header("Location:".$full_url['full_url']);
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
<link rel="stylesheet" href="style.css">

</head>
<body>
<div class="wrapper">
<form action="">
<i class="url-icon uil uil-link"></i>
<input name="fullURL" id="fullURL" type="text" placeholder="Enter or paste a lonk link" required>
<button id="shortenBTN">Shorten</button>
</form>

<?php 
		$sql2 = mysqli_query($conn, "SELECT * FROM url_table ORDER BY 1 DESC"); 
		if(mysqli_num_rows($sql2) > 0){ ?>
			<div class="count">
				<span class="total">
					Total Links: 
					<span>20</span> 
					& Total Clicks: 
					<span>144</span>
				</span>
				<a href="">Clear All</a>
			</div>

			<div class="urls-area">
				<div class="title">
					<li>Shorten Url</li>
					<li>Original URL</li>
					<li>Clicks</li>
					<li>Action</li>
				</div>
				<?php
					while($row = mysqli_fetch_array($sql2)){ ?>
						<div class="data">
							<li>
							<?php
								if('localhost/url?u='. $row['shorten_url']){
									echo 'localhost/url?u='.substr($row['shorten_url'], 0, 50); 
								}
								?>
							</li>
							<li>
							<?php 
								if(strlen($row['full_url']) > 40){
									echo substr($row['full_url'], 0, 50) . ' ' .'....';
								}
							?>
							</li>
							<li><?php echo $row['clicks']; ?></li>
							<li><a href="">Delete</a></li>
					</div>
				<?php } ?>
			</div>
			<?php 	} ?>

</div>

<div class="blur-effect"></div>
<div class="popup-box">
	<div class="info-box">
		Your shortlink is ready.You can also edit your short link now but can't edit once you saved it.
	</div>
	<form action="#">
		<label for="edit">Edit Your shortlink</label>
		<input id="shortenURL" type="text" value="" spellcheck="false">
		<i class="copy-icon uil uil-copy-alt"></i>
		<button class="save-btn">Save</button>
	</form>
</div>

<script src="script.js"></script>
</body>
</html>