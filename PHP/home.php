<?php
   include('session.php');
?>

<html>
<head>
  <title>EzMoney | <?=$name_logged?> Home</title>
</head>
<body>
  <?php
    $user_id = $_SESSION['login_user']
    print $user_id;
   ?>
</body>
</html>
