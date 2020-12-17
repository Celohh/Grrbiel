<?php
if (isset($_POST['signup-submit'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $gender = $_POST['gender'];

  //Filtro de erros.
  if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../register?error=invalidnameemail");
    exit();
  } else {
    require_once "db.php";
    $sql = "SELECT * FROM slogin WHERE userEmail = '$email'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($query);
    if ($query) {
      if ($row) {
        header("Location: ../register?error=emailalreadyexists");
        exit();
      }
    }
    else {
      header("Location: ../register?error=sqlquery");
    }

    $pwdHash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO slogin (userName, userEmail, userPwd, userGender, userLevel)
    VALUES ('$username','$email','$pwdHash','$gender',0)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      session_start();
      $_SESSION['user'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['gender'] = $gender;
      $_SESSION['level'] = 10;
      header("Location: ../?sucess=accCreated");
      exit();
    } else {
      header("Location: ../?sqlquery");
      exit();
    }
  }
} else {
  header("Location: ../?error");
  exit();
}
