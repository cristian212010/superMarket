<?php

if (!defined("DB_TYPE")) { // Esta constante define el tipo de base de datos que se utilizará
    define("DB_TYPE", "mysql");
}

if (!defined("DB_HOST")) { // Esta constante define la dirección del servidor de la base de datos
    define("DB_HOST", "localhost");
}

if (!defined("DB_NAME")) { //  Esta constante define el nombre de la base de datos a la que se desea conectar
    define("DB_NAME", "supermarket");
}

if (!defined("DB_USER")) { //  Esta constante define el nombre de usuario utilizado para autenticarse en la base de datos
    define("DB_USER", "root");
}

if (!defined("DB_PWD")) {  // Esta constante define la contraseña utilizada para autenticarse en la base de datos
    define("DB_PWD", "");
}

?>