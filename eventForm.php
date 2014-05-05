<html>
<head>
<title>Event Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style=" background-color: lightgray;">

<div class="eventform">
<h2 class="editprofile1"style=" font-size: 20pt;font-style: italic;
	 font-family: cursive;font-weight: bold; text-align:center;}"> Event Form</h2>
<form name='eventForm' method='POST' action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month; ?>&day=<?php echo $day; ?>&year=<?php echo $year; ?>&v=true&add=true">
    
            <table class="e" width='400px' border='0'>
        <tr class="e">
            <td class="e" width='150px'>Title:</td>
            <td width='250px'><input class="textbox" type='text' name='txttitle'</td>
        </tr>
        <tr>
            <td class="e" width='150px'>Detail:</td>
            <td width='250px'><textarea class="e" name='txtdetail'></textarea></td>
        </tr>
        <tr>
            <td colspan='2' align='center'><input class="button3" type='submit' name='btnadd' value='Add Event'></td>
           
        </tr>
    </table>
           
     
</form>
</div>
</body>
</html>