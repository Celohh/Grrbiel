<?php
if (session_status() != 2) {
    session_start();
}
if (isset($_SESSION["level"]) && $_SESSION["level"] < 2) {
    header("Location: ../users");
}

$id = $_GET['userID'];
$sql = "SELECT * FROM slogin WHERE userID = '$id'";
$query = mysqli_query($conn, $sql);
if ($query) {
    $array = mysqli_fetch_row($query);
    if (sizeof($array) == 0) {
        exit();
    }
    $buttons = ["button-male", "button-female"];
    echo ('<script>
        document.getElementById("userName").value = "' . $array[1] . '";
        document.getElementById("userEmail").value = "' . $array[2] . '";
        document.getElementById("userPwd").value = "' . $array[3] . '";
        document.getElementById("userLevel").value = "' . $array[5] . '";
        document.getElementById("' . $buttons[$array[4]] . '").classList.add("button-selected");
        document.getElementById("hide-gender").value = "' . $array[4] . '";
        </script>');
}
