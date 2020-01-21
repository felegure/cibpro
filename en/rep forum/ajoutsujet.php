<?include ("../connexion.php")?>

<?
 if  (isset($_POST['Nom']))
  { 
  // Enregistrement du nouveau sujet 
  $Nom=$_POST['Nom'];
  if  (isset($_POST['Email'])){
  	$Email=$_POST['Email'];
  }
  if  (isset($_POST['Sujet'])){
  	$Sujet=$_POST['Sujet'];
  }
   if  (isset($_POST['Msg'])){
  	$Msg=$_POST['Msg'];
  }
 
  $table="message";
  $SQL= "Insert Into $table(NomAuteur,EmailAuteur,SujetMessage,ContenuMessage,EtatMessage,DateMessage)";
  $SQL.=" Values('".trim($Nom)."','".trim($Email)."','".trim($Sujet)."','".trim($Msg)."','I','".date("Y-m-d H:i:s")."')";
  $result= mysqli_query($SQL);
  
 //Recherche de l'Id du message  pour l'affecter à l'Id du père
  
  $IdPere=mysqli_insert_id(); 
    
  $SQL="Update message set IdMessagePere='$IdPere' where IdMessage='$IdPere'";
  $result=mysqli_query($SQL);
  }


?>


<html>
<head>
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="Author" content="Albert OUEDRAOGO">
<title>Espace de discussion de l'OOAS</title>
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

function ValiderMessage()
   {    
  
 if (Blanc(document.AjoutMessage.Nom.value)=="") 
      {
      alert("Vous devez saisir votre Nom!")
      document.AjoutMessage.Nom.focus()
      return false;
    }
   
   if (Blanc(document.AjoutMessage.Sujet.value)=="") 
    {
      alert("Il faudra saisir un sujet pour le Message!")
      document.AjoutMessage.Sujet.focus
      return false;

   }
     
   if (Blanc(document.AjoutMessage.Msg.value)=="")
    {  
      alert("Il faudra saisir le message à envoyer!")
      document.AjoutMessage.Msg.focus()
      return false;
    }
   
    if (Blanc(document.AjoutMessage.Email.value)!="") 
     {
     if (Valider(Blanc(document.AjoutMessage.Email.value))==false) 
        {
         alert("Le email saisi n'est pas valide!")
         document.AjoutMessage.Email.focus()
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
  if (ch1.charAt(i)==" ") i=i-1 
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
<body vlink="#FFFF00" alink="#FFFF00" link="#FFFF00" topmargin="0" bgcolor="#FFEEFF">
    <div align="center">
      <center>
 <? if (!(isset($Nom))) { ?>	
	 <div align="center"></div>
      <div align="center">
        <center>
        
    <table border="0" width="764">
      <tr>
            <td width="100%">
              
          <p align="center"><b><font size="5" face="Comic Sans MS" color="#3333FF">DISCUSSION</font></b></td>
      </tr>
          <tr>
            <td width="100%">
              <hr width="50%">
            </td>
          </tr>
        </table>
        </center>
      </div><br>
    <div align="center">
      <center>
		 
  <form METHOD="POST" ACTION="ajoutsujet.php" name="AjoutMessage">
    <div align="center">
              <center>
            
        <table border="0" width="764">
          <tr>
                
            <td width="100%" align="center"><font face="Comic Sans MS, Arial, Times New Roman">Please enter a topic of discussion to improve the CIB system prototype.&nbsp;</font></td>
          </tr>
            </table></center>
    </div>
            <br>
    <table border="0" width="600" cellspacing="0" cellpadding="2" align="center">
      <tr> 
        <td width="233" align="right" height="25"> 
          <p align="right"><b><font face="Comic Sans MS, Arial, Times New Roman" size="2">First Name , Last Name:</font></b></p>
        </td>
        <td colspan="2" width="428"> 
          <input type="text" name="Nom" value="" size="26">
          <font color="red"><b>*</b></font>
        <center>
        </center>
      </tr>
        <td width="233"> 
      
      <tr> 
        <td width="233" align="right" height="25"> 
          <p align="right"><b><font face="Comic Sans MS, Arial, Times New Roman" color="#000000" size="2">E-mail</font><font color="#000000" size="2">:</font></b></p>
        </td>
        <td colspan="2" width="428"> 
          <input type="text" name="Email" size="26">
        <center>
        </center>
      </tr>
      <tr> 
        <td width="233" align="right" height="23"><b><font face="Comic Sans MS, Arial, Times New Roman" size="2">Topic</font>:</b> </td>
        <td width="428" height="23"> 
          <input type="text" name="Sujet" size="26">
          <font color="red"><b>*</b></font></td>
      </tr>
      <tr align="center"> 
        <td colspan="2" valign="top" height="315"> 
          <p align="center"><b><font size="2" face="Comic Sans MS, Arial, Times New Roman">Message</font></b><font color="red" size="2" face="Comic Sans MS, Arial, Times New Roman"><b>*</b></font><br>
            <textarea name="Msg" rows="12" cols="52"></textarea>
            &nbsp;</p>
          <div align="center"> 
            <center>
              <table width="72%" align="center">
                <tr> 
                  <td align="center"> 
<input type="submit" value="Send" name="Send" onClick="return ValiderMessage()">                    
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    &nbsp 
                  <input type="reset" value="Delete" name="B2">                  </td>
                </tr>
              </table>
            </center>
          </div>
        </td>
      </tr>
    </table>
  </form>
      <center>
		 <? }
            else {?>
      <p>
      <p align="center"><b><strong><big><font face="Bookman Old Style" color="#005A00">Your subject will be ...</font></big> </strong>
				</b></p>
       <p align="center"><b><i><font face="Matura MT Script Capitals" size="5">Thank You</font><font size="4">&nbsp;</font></i></b></p>
    
		 
       <p align="center"><?  }?> </p>
	   <table width="44%">
      <tr bgcolor="#79A2A2"> 
        <Td align="center" height="24" width="50%"><font face="Comic Sans MS, Arial, Times New Roman" color="#FFFFFF"><a href="../index.php"><b><font size="2">Home page</font></b></a> </font> 
        <Td align="center" height="24" width="50%"><font face="Comic Sans MS, Arial, Times New Roman" color="#FFFFFF"><B><font size="2"><a href="theme.php">List of proposed topics</a></font></B> </font> 
      </tr>
    </table>
      </center>
</div>
</body>
</html>
<? mysqli_close() ?>
