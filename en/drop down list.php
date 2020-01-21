<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>TEST DROP DWON LIST</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
Creates a simple drop down list from a SQL query. Column 1 of the query should be the reference, column 2 should be the descriptive text / list entry. You still have to create the <select name=""> tag within your HTML. 

The default value is used to preselect an entry. The value of default is a value that will be in column 1 of the query results.

The value for blank is inserted at the top of the drop down list if required, either as a default value or for informative or instructive text.
 
<?php
function db_createlist($linkID,$default,$query,$blank)
{
    if($blank)
    {
        print("<option select value=\"0\">$blank</option>");
    }

    $resultID = pg_exec($linkID,$query);
    $num       = pg_numrows($resultID); 
    
    for ($i=0;$i<$num;$i++)
    {
        $row = pg_fetch_row($resultID,$i);
        
        if($row[0]==$default)$dtext = "selected";
        else $dtext = "";
    
        print("<option $dtext value=\"$row[0]\">$row[1]</option>");
    }
}
?>  
  
Example 
<select name="select">
<?php 
    // default is 0, no entry will be selected.
    db_createlist($linkID,0,
            "select id,description from list","Please select one ...");
?>
</select> 
 

</body>
</html>
