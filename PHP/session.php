<?php
    include_once('DBConnection.php');
    $db = new DBConnection();
    $dbc = $db->Connect();
    session_start();

    $usuario_conectado = $_SESSION['login_user'];
    
    $sql = mysqli_query($dbc,"SELECT email from Users WHERE username = '$usuario_conectado' ");

    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

    $login_session = $row['username'];
       
    if(!isset($_SESSION['login_user'])){
        header("location:login.php");
    }
?>
