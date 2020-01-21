<?include("../connexion.php")?>

<?  
  if (!(isset($_POST['PereMessage']))){
    
    // Recheche du thème selectionné 
 	//$PereMessage==""
	//if (isset($_POST['IdMessage'])){
		$IdMessage=$_GET['IdMessage'];
    	$SQL="select IdMessage,IdMessagePere,NomAuteur,SujetMessage,ContenuMessage,";
    	$SQL.=" DateMessage from message where IdMessage=$IdMessage and EtatMessage='V'";   
		$result=mysqli_query($SQL);
    	$Msg1=mysqli_fetch_array($result);
    
// Recherche des différentes réponses au thème
	
	$SQL="select IdMessage, IdMessagePere,SujetMessage from message where EtatMessage='V'";
    $SQL.=" and IdMessagePere=$IdMessage and (IdMessagePere <> IdMessage)order by DateMessage DESC";
	$reponse=mysqli_query($SQL);
   //}  
 }
 else
 { 
 	$PereMessage=$_POST['PereMessage'];
  	$Nom=$_POST['Nom'];
    
  	$Email=$_POST['Email'];
  	$Sujet=$_POST['Sujet'];
  	$Msg=$_POST['Msg'];

  $SQL= "Insert Into message(IdMessagePere,NomAuteur,EmailAuteur,SujetMessage,ContenuMessage,EtatMessage,DateMessage)";
  $SQL.=" Values('$PereMessage','".trim($Nom)."','".trim($Email)."','".trim($Sujet)."','".trim($Msg)."','I','".date("Y-m-d H:i:s")."')";
  $result= mysqli_query($SQL);
  
  
 } ?>
<html>
<head>
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="Author" content="Albert OUEDRAOGO">
<title> CIB Forum </title>
<Script language="JavaScript"><!--

function Valider(email)
       { 
        var arobase=email.indexOf("@")
        var point= email.lastIndexOf(".")
      
     if (email.indexOf(" ")>=0) return false
     
     if((arobase <3)||(point+2 > email.length) || (point< arobase+3))
     return false;    
     return true       
  }      

//Procédure de validation du message

function ValiderReponse()
   {    
  
 if (Blanc(document.ReponseMessage.Nom.value)=="") 
      {
      alert("Vous devez saisir votre Nom!")
      document.ReponseMessage.Nom.focus()
      return false;
    }
   
   if (Blanc(document.ReponseMessage.Sujet.value)=="") 
    {
      alert("Il faudra saisir un sujet pour le Message!")
      document.ReponseMessage.Sujet.focus
      return false;

   }
     
   if (Blanc(document.ReponseMessage.Msg.value)=="")
    {  
      alert("Il faudra saisir le message à envoyer!")
      document.ReponseMessage.Msg.focus()
      return false;
    }
   
    if (Blanc(document.ReponseMessage.Email.value)!="") 
     {
     if (Valider(Blanc(document.ReponseMessage.Email.value))==false) 
        {
         alert("Le email saisi n'est pas valide!")
         document.ReponseMessage.Email.focus()
         return false;
         }
     }  
     
   return true;
 }

//fonction permettant d'éleminer le caractère blanc de part et d'autre d'une chaîne de caractère

function Blanc(ch) 
{
 var i=0
 var j=-1
 var ch1=""
 var ok=false
 var ch2=""

if (ch=="") return ch2;
 while ((i< ch.length) &&(ok==false))
   {
  if (ch.charAt(i)==" ")
    i++
    else
    {
     j=i
     ok=true
    }
  }  
 
 if (j==-1)return ch2;
 
 ch1=ch.substring(j,ch.length) //élimination des blancs à gauche
 
 i=ch1.length-1
 ok=false
 while ((i>=0) &&(ok==false))
   {
  if (ch1.charAt(i)==" ")
   i=i-1 
    else
    {
     j=i
     ok=true
    }
   }

ch2=ch1.substring(0,j+1)
return ch2; 
}

//--></Script>

</head>

<body vlink="#003000" link="#003000" bgcolor="#FFEEFF">
    <? if (!(isset($_POST['PereMessage']))){?>

   <div align="center">   </div>
  <div align="center">
        <center>
        
    <table border="0" width="764">
      <tr>
            <td width="100%">
              
          <p align="center"><b><font size="5" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">CIB Forum</font></b> 
        </td>
      </tr>
          <tr>
            <td width="100%">
            
          <p align="center"><font face="Comic Sans MS, Arial, Times New Roman">&nbsp;<font face="Verdana, Arial, Helvetica, sans-serif"> 
              <font face="Comic Sans MS, Arial, Times New Roman">You are free to propose any topic for CIB system improvement..</font><font color="#003000" size="2"></font></font></font></p>            </td>
          </tr>
        </table>
        </center>
</div>
    <br>
	<? function Reponses($Norep , $i)
        {
			$SQL="select IdMessage, IdMessagePere,NomAuteur,SujetMessage,DateMessage";
            $SQL.=" from message where EtatMessage='V' and IdMessagePere=$Norep";
            $SQL.=" and (IdMessagePere <> IdMessage) order by DateMessage DESC";
		    $Msg=mysqli_query($SQL);
		    
		 While ($val=mysqli_fetch_array($Msg)) {?>  
    
<table width="764" align="center">
  <tr>
	    
         <td width="500"><small> <? for ($j=0;$j<$i;$j++){?>&nbsp <? } ?>
         <a HREF="themechoisi.php?IdMessage=<?echo $val["IdMessage"];?>"><? echo $val["SujetMessage"];?></a> 
      de<b> <? echo $val["NomAuteur"];?></b> posted on <b><? echo $val["DateMessage"];?></b></small>
         </td>
  </tr>
			<? $i=$i+10;
			 Reponses ($val["IdMessage"], $i); //Appel de la procédure pour l'affichage des sous réponses 
			 $i=$i-10;
	      }  	 
	    }
	 ?>
 
	  <? $i=0 ?>
		<table width="500" cellspacing="5">
		<tr><td  valign="top" align="left"><small><strong>De : </strong></small><? echo $Msg1["NomAuteur"];?></font></td></tr>
	  	<tr><td  valign="top" align="left"><small><strong>Objet :</strong></small> <? echo $Msg1["SujetMessage"];?></font></td></tr>
		<tr><td  valign="top" align="left"><small><strong>Date : </strong></small> <? echo $Msg1["DateMessage"];?></font></td></tr>
		<tr></td><TD ><b><small>Message :</small></b><br><? echo $Msg1["ContenuMessage"]; ?></td></tr>
		</table>	
	<? if (mysqli_numrows($reponse)>0) {
     //cas où  il y'a eu des interventions sur le thème choisi ?>   
		
          <table width="100%" cellspacing="5">	
			<tr></td><TD ><hr></td></tr>
			<tr><td><b>Reponse(s) &agrave; la contribution ci-dessus</b></td></tr>
			<? Reponses ($Msg1["IdMessage"],$i); ?>
		</table>
	<? } ?>
<? //debut de l'intervention  de l'internaute au forum ?>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
		<TR><TD><hr>
	    <p align="left"><a name="reponse"><b>Answer; to the his conribution</b></a></p>
	    <hr>
		</TD></TR>
		</TABLE><br>
            <div align="center">
              <center>
			<table border="0" width="70%">
			  <tr>
			    <td width="500">
			     
            <form METHOD="POST" ACTION="themechoisi.php" name="ReponseMessage">
              <input type="hidden" name="PereMessage"  value="<? echo $Msg1["IdMessage"]; ?>" size="26"><br>
				<table  border="0" width="500" cellspacing="0" cellpadding="2">
			        <tr>
			          <td width="150" align="right">F irst Name, last Name: <font color="red"><b>*</b></font></td>
			          <td width="350">
					  <input type="text" name="Nom"  value="" size="26"></td>
			        </tr>
			        <tr>
			          <td width="150" align="right">E-mail :&nbsp;&nbsp;&nbsp;&nbsp;</td> 
			          <td width="350"><input type="text" name="Email" size="26"></td>
			        </tr>
					<tr>
			          <td width="150" align="right">Sujet : <font color="red"><b>*</b></font></td>
			          <td width="350"><input type="text" name="Sujet" value="Re:<? echo $Msg1["SujetMessage"]; ?>" size="26"></td>
			        </tr>
					<tr>
			          <td width="500" colspan="2" valign="top">
                        <p align="center">Message <font color="red"><b>*</b></font><br>
					  <textarea  name="Msg"  rows="12" COLS=52 ></textarea>
                        <div align="center">
                          <center>
                        <table width="40%">
                        <tr>
                        <td align="center">
                        <input type="submit" value="Envoyer" name="Envoyer" onclick="return ValiderReponse()"> &nbsp;&nbsp;
                        <input type="reset" value="Annuler" name="Annuler">
			             </td>
			             </tr>
			             </table> 
			              </center>
                        </div>
			      
		      </table>
			    </form>
                </td>
			  </tr>
			</table><br>
              </center>
            </div>
           <? }
              else { ?> 
             <p align="center"><b><strong><big><font face="Bookman Old Style" color="#005A00">Votre
            Intervention sera prise en compte très prochainement</font></big> </strong>
				</b></p>
          <p align="center"><b><i><font face="Matura MT Script Capitals" size="5">Merci
         pour votre confiance</font><font size="4">&nbsp;</font></i></b></p>

           <? } ?> 
            <div align="center">
              <center>
			<table width="90%">
			<tr><Td align="center" bgcolor="#003000" width="30%"><a href="../index.php"><b><font color="#FFFF00" size="2">Retour
                à la page d'accueil</font></b></a>
          <Td align="center" bgcolor="#003000"><B><a href="ajoutsujet.php"><font color="#FFFF00" size="2">Proposer 
            un nouveau th&egrave;me</font></a></B> 
          <Td align="center" bgcolor="#003000" width="30%"><B><font size="2"><font color="#0000FF"><%=replace(space(10)," 
            ","&nbsp;") %></font><a href="theme.php"><font color="#FFFF00">List of proposed topics</font></a></font></B> 
        </tr>
			</table>
              </center>
            </div>
</table>
</body>
</html>
<? mysqli_close(); ?>










