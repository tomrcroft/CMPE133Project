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
		$ccnameerror = false;
		$ccnumerror = false;
		$ccverror = false;
		$expirydateerror = false;

		if (!isset($_POST['ccname'])) {
			$ccnameerror = true;
		}
		if (!isset($_POST['ccnum']) || strlen((string) $_POST['ccnum']) != 16) {
			$error = true;
		}
		if (!isset($_POST['ccv']) || strlen((string) $_POST['ccv']) != 3) {
			$error = true;
		}
		if (!isset($_POST['expirydate']) || !checkExpiryDate($_POST['expirydate'])) {
			$error = true;
		}
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

<?php
function checkExpiryDate($date) {
	$month = $date / 10000;
	$year = $date % 10000;
    if ($month > 12 || $month < 1) {
        return false;
    }
    if ($year < date('Y')) {
        return false;
    }
    if ($year == date('Y') && $month < date('m')) {
    	return false;
    }
    return true;
}
?>
</body>
</html>