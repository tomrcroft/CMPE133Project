<html>
<head>
<title>Subscribe</title>


<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body style=" background-color: lightgray;">
<h1 class="mainlogin"><img class="small-logo" src="sjsu6.png" style="width: 88px; height: 88px; float:left; 
background-color:gray; margin-left:30px;margin-bottom:10px; ">Mentor Web</h1>
<div class="subscribe">

<h2 class="subscribe">Become a Premium member!</h2>
<p class="subscribe">All it takes is <span style="font-size:19pt;font-weight:bold;color:#5FFB17;">$ </span><span style="font-size:16pt;font-weight:bold;">5.00</span> a month to remove all limits of a free account!<p>
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
<form class="subscribe" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Card Holder's name: <input class="textbox" type="text" name="ccname"><br><br>
Card number: <input class="textbox" type="text" name="ccnum"><br><br>
CCV number: <input class="textbox" type="text" name="ccv"><br><br>
Expiration Date (mmyyyy): <input class="textbox" type="text" name="expirydate"><br><br>

<input class="button" type="submit" name="ccsubmit" value="Submit">

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
</div>
</body>
</html>
