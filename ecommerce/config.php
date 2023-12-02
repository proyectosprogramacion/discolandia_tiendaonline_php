
<?php
/*Con PHP podemos almacenar la salida, a medida que se va generando, en un buffer. De modo que no se envíe ningún dato al cliente hasta que se indique expresamente. */
ob_start();

/*crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.  */
session_start();

defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR );

//defined("FRONT") ? null : define ("FRONT", __DIR__.DS."templates/front");
defined("FRONT") ? null : define ("FRONT", "C:/xampp/htdocs/discolandia_tiendaonline_php/ecommerce/app/templates/front");

echo FRONT;


//defined("BACK") ? null : define ("BACK", __DIR__.DS."templates\back");
defined("BACK") ? null : define ("BACK", "C:/xampp/htdocs/discolandia_tiendaonline_php/ecommerce/app/templates/back");

echo BACK;

defined("DB_HOST") ? null : define ("DB_HOST", "localhost");
defined("DB_USER") ? null : define ("DB_USER", "root");
defined("DB_PASSWORD") ? null : define ("DB_PASSWORD", "");
defined("DB_NAME") ? null : define ("DB_NAME", "disco_db");


$connection= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD, DB_NAME); 

require_once("functions.php");


?>
