<? include("../connexion.php")?>

 <? 
//Selection des différents thèmes
$SQL="select IdMessage,SujetMessage,NomAuteur,DateMessage";
$SQL.=" from message Where EtatMessage='V'";
$SQL.=" and IdMessage=IdMessagePere order by DateMessage DESC"; 
$Theme=mysqli_query($SQL);

?>

<html>

<head>
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="Author" content="Albert OUEDRAOGO">
<title>CIB FORUM</title>
</head>
<body vlink="#003000" link="#003000" topmargin="0" bgcolor="#FFEEFF" >
    
  <div align="center">  </div>
  <div align="center">
        <center>
        
    <table border="0" width="764">
      <tr>
            <td width="100%">
              
          <p align="center"><b><font size="5" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">CIB Forum 
            </font><font size="5" face="Comic Sans MS, Arial, Times New Roman" color="#000000">&nbsp;</font></b>          
          <hr> 
        </td>
      </tr>
          <tr>
            
        <td width="100%"> 
          <p align="center"><font face="Comic Sans MS, Arial, Times New Roman">&nbsp;<font face="Verdana, Arial, Helvetica, sans-serif"> 
            <font color="#003000" size="2"><b>Please be part of the network for CIB System improvement; !</b></font></font></font></p>
            </td>
          </tr>
        </table>
        </center>
</div>
	<hr width="50%">
    
<p align="center"><b><a href="ajoutsujet.php"><font face="Verdana, Arial, Helvetica, sans-serif">Please click here to propose a topic</font></a> <br>
	
    </b>
	
	<?if (mysqli_numrows($Theme)>0) {?>
</p>
    <div align="center">
      <center>
		
    <table width="600" cellspacing="5" height="27">
      <tr>
	 		<td align="center" height="19"> 
	 		  
             <font face="Matura MT Script Capitals" size="4"> 
	 		  
	 		 Nous enregistrons
            <? // cas où on a qu'un sujet de débat
             if (mysqli_numrows($Theme)==1) { ?>
             <b>1</b> sujet
             <? } else { ?>
             <b><? echo mysqli_numrows($Theme)?></b>
             Topics <? } ?>&nbsp;</font>
	 		 		 	 		  
			</td>
	  </tr>
		</table>
      </center>
    </div><br>
    <div align="center">
      <center>
		
    <table width="764" cellspacing="5" border="1">
      <tr>
    		<td width="440" bgcolor="#003000"  valign="left" align="center" height="17"><small><strong><font color="#FFFF00">Sujet</font></strong></small></td>
  			<td width="440" bgcolor="#003000"  valign="left" align="center" height="17"><small><strong><font color="#FFFF00">Auteur</font></strong></small></td>
  			<td width="440" bgcolor="#003000"  valign="left" align="center" height="17"><small><strong><font color="#FFFF00">Date Enregistrement</font></strong></small></td>

   	  </tr>
			
			<? 
			   while ($val= mysqli_fetch_array($Theme)) {?>   
      		<tr>
			  	
        <td align="center" valign="top"><small><a HREF="themechoisi.php?IdMessage=<?echo $val["IdMessage"];?>"><? echo trim($val["SujetMessage"]);?> 
          </a></small></td>
     		   <td align="center" valign="top"><? echo $val["NomAuteur"]?></td>
     		   <td align="center" valign="top"><? echo $val["DateMessage"]?>
     		
     		</tr>
    			<? }?> 
   		</table>
      </center>
    </div><br>
     		<? }
             else { ?>
		  <p>
		
<div align="center">
		
  <table width="764" cellspacing="5">
    <tr> 
      <td colspan="4"> 
        <p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">No topics . 
		  Please propose . </font></p>
        <center>
      </td>
      <td align="center"><br>
    </tr>
  </table>
  </div>
 	<? } ?>		
    <br>
            <div align="center">
              <center>
              
    <table border="0" width="21%" cellspacing="0" cellpadding="0" bgcolor="#79A2A2">
      <tr bgcolor="#79A2A2"> 
        <td width="100%" align="center" height="24"><b><a href="../index.php"><font size="2" color="#FFFFFF" face="Comic Sans MS, Arial, Times New Roman">Home Page</font></a></b></td>
      </tr>
              </table>
              </center>
            </div>
    <p align="right">&nbsp;</p>
</body>
</html>
<? mysqli_close()?>