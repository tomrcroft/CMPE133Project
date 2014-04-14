<html>
<head>
</head>

<body>
<h1>Become a Premium member!</h1>
<p>All it takes is $5 a month to remove all limits of a free account!<p>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// validate and then enter credit card info to database
	if (isset($_POST['ccsubmit'])) {
		echo '<p>Blahhh! Submitted!</p>';
    }
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Card Holder's name: <input type="text" name="ccname"><br>
Card number: <input type="text" name="ccnum"><br>
CCV number: <input type="text" name="ccv"><br>
Expiration Date (mmyyyy): <input type="text" name="expirydate"><br>
<input type="submit" name="ccsubmit" value="Submit">
</form>

</body>
</html>