<?php

session_start();

require 'database.php';

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to your Web App</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="styles/myStyles.css">
    <script type="text/javascript" src="scripts/myScripts.js"></script>
</head>
<body>

	<div class="header">
		<a href="/">Your App Name</a>
	</div>

	<?php if( !empty($user) ): ?>

		<br />Welcome <?= $user['email']; ?> 
		<br/><br />You are successfully logged in!
		<br/><br/>

		<h1>Simple Website</h1>
        <figure>
            <img src="https://picsum.photos/200" alt="Random 200x200 image" title="Random 200x200 image">
            <figcaption>Fig.1 - Random Image</figcaption>
        </figure>
            <p id="paratxt" style="color:red">This is a HTML paragraph styled with css. <br>
            Press the HTML button below to run a JavaScript function <br>
            which will change the colour of this paragraph.
        </p>
        <button onclick="changeTextColor();">Click me to change paragraph text colour!</button>
        <!-- Uncomment the line below once you have the shopping cart integrated -->
        <!-- <a href="shop.html" class="button">Go to Shop</a> -->

		<br><br><br><br><br>
		<a href="logout.php">Logout?</a>

	<?php else: ?>

		<h1>Please Login or Register</h1>
		<a href="login.php">Login</a> or
		<a href="register.php">Register</a>

	<?php endif; ?>

</body>
</html>
