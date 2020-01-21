<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>CommentNlinks</title>
    <link href="default.css" type="text/css" rel="stylesheet">
  </head>

  <body>

<?
# Cette page affiche une liste de liens commentés
# Si pas d'argument : tous les enregistrements
# Si on envoi $lien_search_string et/ou $comment_search_string
# seul les enregistrement correspondant à la recherche son retournés



# Construction de la requête en fonction des paramètres

# pas de paramètre: tous les enregistrements.
if ($lien_search_string=="" and $comment_search_string=="") {
  $query_string = "SELECT * from clavelLinks ORDER BY nom";
  $title = "Liste de tous les liens commentés";
} else {
  $title = "Liste d'après vos critères de sélection";
  $query_string = "SELECT * from clavelLinks WHERE";
  if ($lien_search_string != "") {
    $query_string .= " lien LIKE '%$lien_search_string%'";
    if ($comment_search_string != "") {
      $query_string .= " and";
    }
  }
  if ($comment_search_string != "") {
    $query_string .= " comment LIKE '%$comment_search_string%'";
  }
}


echo "<h1>$title</h1>";

echo "<hr>";

mysqli_pconnect("localhost","nobody","");
mysqli_select_db("test");
$query = mysqli_query($query_string);

echo "<table border=\"1\" width=\"100%\">";

for ($i=0; $i<mysqli_num_rows($query); $i++) {
  $id =  mysqli_result($query,$i,"id");
  $nom = mysqli_result($query,$i,"nom");
  $lien = mysqli_result($query,$i,"lien");
  $comment = mysqli_result($query,$i,"comment");

  echo "<tr>";
  echo "<td align=\"center\" width=\"10%\">";
  echo "<a href=\"edit.php?id=$id\">Editer</a><br>";
  echo "<a href=\"delete.php?id=$id\">supprimer</a>";
  echo "</td>";
  echo "<td>";
  echo "<p class=\"link\"><a href=\"$lien\">$lien</a></p>";
  echo "<p class=\"comment\">$comment</p>";
  echo "<p class=\"author\">Posté par: $nom</p>";
  echo "</td>";
  echo "</tr>";
}


?>

      </table>
      <p class="menu">
    <a href="main.html">Accueil</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="add-link.html">Ajouter un autre lien</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="search.html">Chercher un enregistrement</a>&nbsp;&nbsp;&nbsp;&nbsp;
      </p>
      <hr>
      <address><a name="Signature" href="http://tecfa.unige.ch/~clavel/">O.C. (alias Z)</a></address>
      <!-- Created: Wed Dec 12 03:46:11 MET 2001 -->
      <!-- hhmts start -->
Last modified: Wed Dec 12 06:05:15 MET 2001
<!-- hhmts end -->
      
  </body>
</html>


      
