<?php
require "db.php";

if (isset($_POST['login-submit'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT userEmail FROM slogin WHERE userEmail = '$email'";
  $resultado = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row($resultado);

  if ($row) {
    $sql = "SELECT * FROM slogin WHERE userEmail = '$email'";
    $resultado = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($resultado);
    $pwdCheck = password_verify($password, $row['userPwd']);

    if ($pwdCheck == true) {
      session_start();
      $_SESSION["id"] = $row["userID"];
      $_SESSION["user"] = $row["userName"];
      $_SESSION["level"] = $row["userLevel"];
      header("Location: ../?sucess=logged");
    } else if ($pwdCheck == false) {
      header("Location: ../register?error=userincorrect");
    }
  } else {
    header("Location: ../register?error=usernotfound");
  }
} else {
  header("Location: ../?ERROR");
  exit();
}
