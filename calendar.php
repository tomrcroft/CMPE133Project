
<?php
/* 
 * The following code was created using a tutorial by "unknownghost03"
 * The url for his tutorial is as follows "https://www.youtube.com/user/unknownghost03"
 * I do not own the right to code but used it as a guide to create the calender.
 */
session_start();
$loggedIn=isset($_SESSION['username']);
if(!$loggedIn)
{
    header('location:mainLogin.php');
}
include 'DatabaseFunctions.php';


?>
<?php
$con=mysqli_connect("mydbinstance.czp48rfeukis.us-west-2.rds.amazonaws.com","tomrcroft","password","cmpe133Project");


?>
<html>
    <head>
        <script>
            function goLastMonth(month, year) {
                if (month == 1) {
                    --year;
                    month = 13;
                }
                --month
                var monthstring = "" + month + "";
                var monthlength = monthstring.length;
                if (monthlength <= 1) {
                    monthstring = "0" + monthstring;
                }
                document.location.href = "<?php $_SERVER['PHP_SELF']; ?>?month=" + monthstring + "&year=" + year;
            }
            function goNextMonth(month, year) {
                if (month == 12) {
                    ++year;
                    month = 0;
                }
                ++month
                var monthstring = "" + month + "";
                var monthlength = monthstring.length;
                if (monthlength <= 1) {
                    monthstring = "0" + monthstring;
                }
                document.location.href = "<?php $_SERVER['PHP_SELF']; ?>?month=" + monthstring + "&year=" + year;
            }
        </script>
        <style>
            .today{
                background-color:#00FF00;
            }
            .event{
                background-color: #FF8080;
            }
        </style>
    </head>
    <body>
        <?php
        if (isset($_GET['day'])) {
            $day = $_GET['day'];
        } else {
            $day = date("j");
        }
        if (isset($_GET['month'])) {
            $month = $_GET['month'];
        } else {
            $month = date("n");
        }
        if (isset($_GET['year'])) {
            $year = $_GET['year'];
        } else {
            $year = date("Y");
        }
        $currentTimeStamp = strtotime("$day-$month-$year");
        $monthName = date("F", $currentTimeStamp);
        $numDays = date("t", $currentTimeStamp);
        $counter = 0;
        ?>
        <?php
        if (isset($_GET['add'])) {
            
            $uName=$_SESSION['username'];
            $title = $_POST['txttitle'];
            $detail = $_POST['txtdetail'];
            $eventdate = $month . "/" . $day . "/" . $year;
            $sqlinsert = "INSERT into eventcalendar(username,Title,Detail,eventDate,dateAdded) values ('" . $uName. "','" . $title . "','" . $detail . "','" . $eventdate . "',now())";
            $resultinginsert = mysqli_query($con, $sqlinsert);
            if ($resultinginsert) {
                echo "Event was successfully Added...";
            } else {
                echo "Event Failed to be Added....";
            }
        }
         if(isset($_GET['delete']))
         {
            $uName=$_SESSION['username'];
            $title = $_POST['txttitle'];
            $eventdate = $month . "/" . $day . "/" . $year;
            $sqldelete = "DELETE FROM eventcalendar WHERE username='$uName' and Title='$title' and eventDate='$eventdate'";
            $resultingdelete = mysqli_query($con, $sqldelete);
            if ($resultingdelete) {
                echo "Event was successfully Deleted...";
            } else {
                echo "Event Failed to be Deleted....";
            }
         }
        
        ?>

        <table border='0'>
            <tr>
                <td><input style='width:50px;' type='button' value='<'name='previousbutton' onclick ="goLastMonth(<?php echo $month . "," . $year ?>)"></td>
                <td colspan='5'><?php echo $monthName . ", " . $year; ?></td>
                <td><input style='width:50px;' type='button' value='>'name='nextbutton' onclick ="goNextMonth(<?php echo $month . "," . $year ?>)"></td>
            </tr>
            <tr>
                <td width='50px'>Sun</td>
                <td width='50px'>Mon</td>
                <td width='50px'>Tue</td>
                <td width='50px'>Wed</td>
                <td width='50px'>Thu</td>
                <td width='50px'>Fri</td>
                <td width='50px'>Sat</td>
            </tr>
            <?php
            echo "<tr>";
            for ($i = 1; $i < $numDays + 1; $i++, $counter++) {
                $timeStamp = strtotime("$year-$month-$i");
                if ($i == 1) {
                    $firstDay = date("w", $timeStamp);
                    for ($j = 0; $j < $firstDay; $j++, $counter++) {
                        echo "<td>&nbsp;</td>";
                    }
                }
                if ($counter % 7 == 0) {
                    echo"</tr><tr>";
                }
                $monthstring = $month;
                $monthlength = strlen($monthstring);
                $daystring = $i;
                $daylength = strlen($daystring);
                if ($monthlength <= 1) {
                    $monthstring = "0" . $monthstring;
                }
                if ($daylength <= 1) {
                    $daystring = "0" . $daystring;
                }
                $todaysDate = date("m/d/Y", strtotime('-1 day'));
               
                $dateToCompare = $monthstring . '/' . $daystring . '/' . $year;
                echo "<td align='center' ";
                if ($todaysDate == $dateToCompare) {
                   echo "class='today'"; 
                } else {
                    $sqlCount = "select * from eventcalendar where eventDate='" . $dateToCompare . "'";
                    $noOfEvent = mysqli_num_rows(mysqli_query($con, $sqlCount));
                    if ($noOfEvent >= 1) {
                        echo "class='event'";
                    }
                }
                echo "><a href='" . $_SERVER['PHP_SELF'] . "?month=" . $monthstring . "&day=" . $daystring . "&year=" . $year . "&v=true'>" . $i . "</a></td>";
            }
            echo "</tr>";
            ?>
        </table>
        <?php
        if (isset($_GET['v'])) {
            echo "<hr>";
            echo "<a href='" . $_SERVER['PHP_SELF'] . "?month=" . $month . "&day=" . $day . "&year=" . $year . "&v=true&f=true'>Add Event</a>";
            echo "<br/>";
            echo "<a href='" . $_SERVER['PHP_SELF'] . "?month=" . $month . "&day=" . $day . "&year=" . $year . "&v=true&g=true'>Delete Event</a>";
            if (isset($_GET['f'])) {
                include("eventForm.php");
            }
            if (isset($_GET['g'])) {
                include("deleteForm.php");
            }
            $sqlEvent = "select * FROM eventcalendar where eventDate='" . $month . "/" . $day . "/" . $year . "'";
            $resultEvents = mysqli_query($con,$sqlEvent);
            echo "<hr>";
            while ($events = mysqli_fetch_array($resultEvents)) {
                echo "Title: " . $events['Title'] . "<br>";
                echo "Detail: " . $events['Detail'] . "<br>";
            }
        }
        ?>
    </body>
</html> 
