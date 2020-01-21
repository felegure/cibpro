<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p>function&nbsp;switchcolor() <br>
&nbsp; {&nbsp; <br>
&nbsp;&nbsp;&nbsp; static&nbsp;$col; <br>
&nbsp;&nbsp;&nbsp; $couleur1&nbsp;=&nbsp;"#CCCCFF"; <br>
&nbsp;&nbsp;&nbsp; $couleur2&nbsp;=&nbsp;"#9999FF"; <br>
  <br>
&nbsp;&nbsp;&nbsp;&nbsp; if&nbsp;($col&nbsp;==&nbsp;$couleur1) <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; { <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $col&nbsp;=&nbsp;$couleur2; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; } <br>
&nbsp;&nbsp;&nbsp;&nbsp; else <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; { <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $col&nbsp;=&nbsp;$couleur1; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; } <br>
&nbsp;&nbsp;&nbsp;&nbsp; return&nbsp;$col;&nbsp; <br>
&nbsp; } </p>
<table>
  <tr>
    <td class="f7">&lt;?&nbsp; <br>
&nbsp;&nbsp; echo&nbsp;'&lt;select&nbsp;size=1&nbsp;name="cat"&gt;'."\n";&nbsp; <br>
&nbsp;&nbsp; echo&nbsp;'&lt;option&nbsp;value="-1"&gt;Choisir&nbsp;un&nbsp;r&eacute;sultat&lt;option&gt;'."\n";&nbsp; <br>
      <br>
      <em>//&nbsp;R&eacute;cup&eacute;ration&nbsp;des&nbsp;informations&nbsp;tri&eacute;es&nbsp;par&nbsp;ordre&nbsp;alphab&eacute;tique&nbsp; <br>
      </em>&nbsp;&nbsp;$sql&nbsp;=&nbsp;"SELECT&nbsp;valeur,&nbsp;texte&nbsp;FROM&nbsp;ma_table&nbsp;ORDER&nbsp;BY&nbsp;texte";&nbsp; <br>
&nbsp;&nbsp; $ReqLog&nbsp;=&nbsp;mysqli_query($sql,&nbsp;$connexion);&nbsp; <br>
      <br>
&nbsp;&nbsp; while&nbsp;($resultat&nbsp;=&nbsp;mysqli_fetch_row($ReqLog))&nbsp;{&nbsp; <br>
&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;option&nbsp;value="'.$resultat[0].'"&gt;'.$resultat[1];&nbsp; <br>
&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;/option&gt;'."\n";&nbsp; <br>
&nbsp;&nbsp; }&nbsp; <br>
      <br>
&nbsp;&nbsp; echo&nbsp;'&lt;/select&gt;'."\n";&nbsp; <br>
      ?&gt; </td>
  </tr>
</table>
<p> &lt;?phpecho&nbsp;date("d-m-Y");&nbsp;//&nbsp;affiche&nbsp;par&nbsp;exemple&nbsp;"18-06-2003"?&gt; </p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p> &lt;html&gt; <br>
&lt;title&gt;Annuaire&lt;/title&gt; <br>
&lt;body&gt; <br>
&lt;? <br>
<em>//&nbsp;information&nbsp;pour&nbsp;la&nbsp;connection&nbsp;&agrave;&nbsp;le&nbsp;DB <br>
</em>$host&nbsp;=&nbsp;'localhost'; <br>
$user&nbsp;=&nbsp;'root'; <br>
$pass&nbsp;=&nbsp;''; <br>
$db&nbsp;=&nbsp;'annuaire'; <br>
<br>
<em>//&nbsp;connection&nbsp;&agrave;&nbsp;la&nbsp;DB <br>
</em>$link&nbsp;=&nbsp;mysqli_connect&nbsp;($host,$user,$pass)&nbsp;or&nbsp;die&nbsp;('Erreur&nbsp;:&nbsp;'.mysqli_error()&nbsp;); <br>
mysqli_select_db($db)&nbsp;or&nbsp;die&nbsp;('Erreur&nbsp;:'.mysqli_error()); <br>
<br>
<em>//&nbsp;requ&ecirc;te&nbsp;SQL&nbsp;qui&nbsp;compte&nbsp;le&nbsp;nombre&nbsp;total&nbsp;d'enregistrement&nbsp;dans&nbsp;la&nbsp;table&nbsp;et&nbsp;qui <br>
</em>//r&eacute;cup&egrave;re&nbsp;tous&nbsp;les&nbsp;enregistrements <br>
$select&nbsp;=&nbsp;'SELECT&nbsp;nom,prenom,adresse,cp,ville&nbsp;FROM&nbsp;site_deploiement'; <br>
$result&nbsp;=&nbsp;mysqli_query($select,$link)&nbsp;or&nbsp;die&nbsp;('Erreur&nbsp;:&nbsp;'.mysqli_error()&nbsp;); <br>
$total&nbsp;=&nbsp;mysqli_num_rows($result); <br>
<br>
<br>
<em>//&nbsp;si&nbsp;on&nbsp;a&nbsp;r&eacute;cup&eacute;r&eacute;&nbsp;un&nbsp;r&eacute;sultat&nbsp;on&nbsp;l'affiche. <br>
</em>if($total)&nbsp;{ <br>
<em>//&nbsp;debut&nbsp;du&nbsp;tableau <br>
</em>&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;'&lt;table&nbsp;bgcolor="#FFFFFF"&gt;'."\n"; <br>
<em>//&nbsp;premi&egrave;re&nbsp;ligne&nbsp;on&nbsp;affiche&nbsp;les&nbsp;titres&nbsp;pr&eacute;nom&nbsp;et&nbsp;surnom&nbsp;dans&nbsp;2&nbsp;colonnes <br>
</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;'&lt;tr&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;td&nbsp;bgcolor="#669999"&gt;&lt;b&gt;&lt;u&gt;Nom&lt;/u&gt;&lt;/b&gt;&lt;/td&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;td&nbsp;bgcolor="#669999"&gt;&lt;b&gt;&lt;u&gt;Pr&eacute;nom&lt;/u&gt;&lt;/b&gt;&lt;/td&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;td&nbsp;bgcolor="#669999"&gt;&lt;b&gt;&lt;u&gt;Adresse&lt;/u&gt;&lt;/b&gt;&lt;/td&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;td&nbsp;bgcolor="#669999"&gt;&lt;b&gt;&lt;u&gt;Code&nbsp;Postal&lt;/u&gt;&lt;/b&gt;&lt;/td&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;td&nbsp;bgcolor="#669999"&gt;&lt;b&gt;&lt;u&gt;Ville&lt;/u&gt;&lt;/b&gt;&lt;/td&gt;'&nbsp;; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;/tr&gt;'."\n"; <br>
<em>//&nbsp;lecture&nbsp;et&nbsp;affichage&nbsp;des&nbsp;r&eacute;sultats&nbsp;sur&nbsp;2&nbsp;colonnes,&nbsp;1&nbsp;r&eacute;sultat&nbsp;par&nbsp;ligne.&nbsp;&nbsp;&nbsp;&nbsp; <br>
</em>&nbsp;&nbsp;&nbsp;&nbsp;while($row&nbsp;=&nbsp;mysqli_fetch_array($result))&nbsp;{ <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;tr&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;td&nbsp;bgcolor="#CCCCCC"&gt;'.$row["nom"].'&lt;/td&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;td&nbsp;bgcolor="#CCCCCC"&gt;'.$row["prenom"].'&lt;/td&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;td&nbsp;bgcolor="#CCCCCC"&gt;'.$row["adresse"].'&lt;/td&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;td&nbsp;bgcolor="#CCCCCC"&gt;'.$row["cp"].'&lt;/td&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;td&nbsp;bgcolor="#CCCCCC"&gt;'.$row["ville"].'&lt;/td&gt;'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;/tr&gt;'."\n"; <br>
&nbsp;&nbsp;&nbsp;&nbsp; } <br>
&nbsp;&nbsp;&nbsp;&nbsp; echo&nbsp;'&lt;/table&gt;'."\n"; <br>
<em>//&nbsp;fin&nbsp;du&nbsp;tableau. <br>
</em>} <br>
else&nbsp;echo&nbsp;'Pas&nbsp;d\'enregistrements&nbsp;dans&nbsp;cette&nbsp;table...'; <br>
<br>
<em>//&nbsp;on&nbsp;lib&egrave;re&nbsp;le&nbsp;r&eacute;sultat <br>
</em>mysqli_free_result($result); <br>
<br>
?&gt; <br>
&lt;/body&gt; <br>
&lt;/html&gt;&nbsp; </p>
<p>&nbsp;</p>
<table>
  <tr>
    <td>&lt;?php <br>
      $req = mysqli_query("...."); <br>
      echo "&lt;table&gt;"; <br>
      while($res = mysqli_fetch_array($req)) <br>
&nbsp; { <br>
&nbsp;&nbsp;&nbsp; echo "&lt;tr bgcolor=\""; echo switchcolor(); echo "\"&gt;&lt;td&gt;...&lt;/tr&gt;"; <br>
&nbsp; } <br>
      echo "&lt;/table&gt;"; </td>
  </tr>
</table>
<br>
<img height="46" src="/php.gif" width="85"><br>
Pour pouvoir le t&eacute;l&eacute;charger, <a href="javascript:ident();">connectez-vous </a> ! ;)
<table>
  <tr>
    <td class="f7">function&nbsp;switchcolor() <br>
&nbsp; {&nbsp; <br>
&nbsp;&nbsp;&nbsp; static&nbsp;$col; <br>
&nbsp;&nbsp;&nbsp; $couleur1&nbsp;=&nbsp;"#CCCCFF"; <br>
&nbsp;&nbsp;&nbsp; $couleur2&nbsp;=&nbsp;"#9999FF"; <br>
      <br>
&nbsp;&nbsp;&nbsp;&nbsp; if&nbsp;($col&nbsp;==&nbsp;$couleur1) <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; { <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $col&nbsp;=&nbsp;$couleur2; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; } <br>
&nbsp;&nbsp;&nbsp;&nbsp; else <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; { <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $col&nbsp;=&nbsp;$couleur1; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; } <br>
&nbsp;&nbsp;&nbsp;&nbsp; return&nbsp;$col;&nbsp; <br>
&nbsp; } </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
