<?php

$path = $_SERVER['DOCUMENT_ROOT']."/wahowebsite/cibproto/en"; // play with the path if the document root does noet exist
//$fullPath = $path.$_GET['download_file'];
echo "AVANT Chemin = $path";
//$fullPath = $path.$_GET['West Africa RHCS-R3.pdf'];
$fullPath = $path."/download a file.phph.txt";
echo "APRES Chemin = $fullPath";
if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]); 
	echo "  xxx ext=$ext";
 /*   switch ($ext) {
        case "txt":
		header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
        
        break;
        default;
		header("Content-type: application/pdf"); // add here more headers for diff. extensions
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachement' to force a download
      
    }
	*/
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
   
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose ($fd);
exit;
// example: place this kind of link into your document where the download is shown:
// <a href="download.php?download_file=some_file.pdf">Download here</a> West Africa RHCS-R3
?>
