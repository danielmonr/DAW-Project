<?php
   include_once("DBConnection.php");
   $db = new DBConnection();
   $dbc = $db->Connect();
   session_start();

   $valid = false;

   if (isset($_POST['username']) && isset($_POST['password'])){
     $valid = true;
   }
   else{
     print ("Please insert your username and password.<br/>");
   }

   $myusername = mysqli_real_escape_string($dbc,$_POST['username']);
   $mypassword = mysqli_real_escape_string($dbc,$_POST['password']);
   $sql = "SELECT * FROM Users WHERE email = $myusername' and password = '$mypassword'";
   $result = mysqli_query($dbc, $sql);

   print ($result);


   /*if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($dbc,$_POST['username']);
      $mypassword = mysqli_real_escape_string($dbc,$_POST['password']);

      $sql = "SELECT id FROM Users WHERE email = $myusername' and password = '$mypassword'";

      $result = $dbc->query($sql);

      if($result->num_rows > 0) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }*/
?>
