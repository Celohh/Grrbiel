<?php
if (session_status() != 2) {
    session_start();
}
if (isset($_SESSION["level"]) && $_SESSION["level"] < 1) {
    header("Location: ../products");
}

$id = $_GET['tenisID'];
$sql = "SELECT * FROM stenis WHERE tenisID = '$id'";
$query = mysqli_query($conn, $sql);
if ($query) {
    $array = mysqli_fetch_row($query);
    if (sizeof($array) == 0) {
        exit();
    }
    $images = explode(",", $array[3]);
    $buttons = ["button-male", "button-female", "button-unisex"];
    echo '<script>';
    for ($i = 1; $i <= sizeof($images); $i++) {
        $labelIndex = "img_selector" . strval($i);
        echo 'document.getElementById("' . $labelIndex . '").innerHTML = "' . $images[$i - 1] . '";';
    };
    echo ('
            document.getElementById("tenisName").value = "' . $array[1] . '";
            document.getElementById("tenisDesc").value = "' . $array[2] . '";
            document.getElementById("tenisPrice").value = "' . $array[4] . '";
            document.getElementById("hide-gender").value = "' . $array[5] . '";
            document.getElementById("' . $buttons[$array[5]] . '").classList.add("button-selected");
            </script>');
}
