<?php
        session_start();
        if(empty($_SESSION['username'])) 
		{
    die('Error. Bad authentification or Your session has expired');
	//.
    //                   Please <a href="login.php">vous identifier</a> relogin or contact  
    //    <a href="mailto:fnezzi@wahooas.org"> CIB Manager' </a>;
        }

?>