<?php
  session_start();
  $_SESSION['logged'] = 0;

  if (isset($_POST['submit'])) 
    if ($_POST['username'] == "mike@m.com" &&
        $_POST['password'] == "1234")
      $_SESSION['logged'] = 1;
    echo "Login<br>";
  ?>
