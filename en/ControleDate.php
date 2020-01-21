
<?php
function ControleDate ($date, $vers_mysql)

{

// JJ/MM/AAAA => AAAA-MM-JJ
if($vers_mysql)
{
$pattern = “`([0-9]{2})/([0-9]{2})/([0-9]{4})`”;
$replacement = “$3-$2-$1?;
}

// AAAA-MM-JJ => JJ/MM/AAAA
else
{
$pattern = “`([0-9]{4})-([0-9]{2})-([0-9]{2})`”;
$replacement = “$3/$2/$1?;
}

return preg_replace($pattern, $replacement, $date);
} 
 
?>