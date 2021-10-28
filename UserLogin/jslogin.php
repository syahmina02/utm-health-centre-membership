<?php
session_start();
require_once('config.php');


$studentid = $_POST['studentid'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE studentid = ? AND password = ? LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$studentid, $password]);

if($result){
    $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
    if($stmtselect->rowCount() > 0){
        $_SESSION['userlogin'] = $user;
        echo '1';
    }else{
        echo 'The student ID and password do not match.';
    }
}else{
    echo 'There were errors while connecting to database.';
}
