<?php
   include('session.php');
   include_once('DBConnection.php');
   $db = new DBConnection();
   $dbc = $db->Connect();
?>

<html>
<head>
  <title>EzMoney | <?=$name_logged?> Home</title>
</head>
<body>
  <?php
    $user_id = $_SESSION['login_user'];
    $sql = "SELECT name, lastname, email FROM Users WHERE id = $user_id";
    $result = $dbc->query($sql);
    print $user_id;

    $row = $result->fetch_assoc();
    print $row["name"];
    print $row["lastname"];
    print $row["email"];

   ?>

</body>
</html>
