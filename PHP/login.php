<?php
   include_once("DBConnection.php");
   $db = new DBConnection();
   $dbc = $db->Connect();
   session_start();

   $valid = false;

   print("entro<br/>");

   if (isset($_POST['username']) && isset($_POST['password'])){
     $valid = true;
     print("valid<br/>");
   }
   else{
     print ("Please insert your username and password.<br/>");
   }

   $myusername = mysqli_real_escape_string($dbc,$_POST['username']);
   print($myusername);
   $mypassword = mysqli_real_escape_string($dbc,$_POST['password']);
   $sql = "SELECT * FROM Users WHERE email = '$myusername' and password = '$mypassword'";
   print("<br/>".$sql . "<br/>");
   $result = $dbc->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["lastname"]. "<br>";
    }
} else {
    print ("Invalid username or password<br/>");
}


   print ("acabo<br/>");

   


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
