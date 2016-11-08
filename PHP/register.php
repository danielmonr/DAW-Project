<?php
include_once('DBConnection.php');
$db = new DBConnection();
$dbc = $db->Connect();

$valid = false;
$errors = "";

if (isset($_POST['name'])){
  $username = $_POST['name'];
  if (isset($_POST['lastname'])){
    $lastname = $_POST['lastname'];
    if (isset($_POST['email'])){
      $email = $_POST['email'];
      if (isset($_POST['password'])){
        $password = $_POST['password'];
        if (isset($_POST['passwordconf'])){
          $passwordconf = $_POST['passwordconf'];
          if ($password == $passwordconf){
            $valid = true;
          }
          else{
            $errors = $errors . "Passwords don't match.<br/>";
          }
        }
        else{
          $errors = $errors . "Please fill the Password confirmation field.<br/>";
        }
      }
      else{
        $errors = $errors . "Please fill the Password field.<br/>";
      }
    }
    else{
      $errors = $errors . "Please fill the Email field.<br/>";
    }
  }
  else{
    $errors = $errors . "Please fill the Last Name field.<br/>";
  }
}
else{
  $errors = $errors . "Please fill the Name field.<br/>";
}

if(!$valid){
  print ($errors);
  exit(0);
}

$query = "INSERT INTO Users (name, lastname, password, email) values ('$username', '$lastname', '$password', '$email')";
$inserted = mysqli_query($dbc, $query);
if ($inserted == 1){
  echo "Success, user registered!";
}
else{
  echo "Failed to register. :C";
}
mysqli_close($dbc);
return json;

?>
