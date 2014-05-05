
<form name='deleteForm' method='POST' action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month; ?>&day=<?php echo $day; ?>&year=<?php echo $year; ?>&v=true&delete=true">
    <table width='400px' border='0'>
        <tr>
            <td width='150px'>Title</td>
            <td width='250px'><input type='text' name='txttitle'</td>
        </tr>      
        <tr>
            <td colspan='2' align='center'><input type='submit' name='btndelete' value='Delete Event'></td>
        </tr>
    </table>
</form>

