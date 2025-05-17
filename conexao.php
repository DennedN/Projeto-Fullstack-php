<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'crud');


$conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conexao->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>