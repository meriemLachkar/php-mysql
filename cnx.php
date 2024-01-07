<?php 
<?php
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'todolist');
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');

$connexion = mysqli_connect(DB_HOST . ':' . DB_PORT, DB_USER, DB_PASS, DB_NAME);

if (!$connexion) {
    die("La connexion a échoué : " . mysqli_connect_error());
}


mysqli_close($connexion);
?>
// try{
//     $pdo = new PDO("mysql:host=localhost;dbname=todolist", "root" , "");
//     // echo "valid";
// }
// catch (PDOException $m){
//     die("ERREUR".$m->getMessage());
// }