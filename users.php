<?php
if (session_status() != 2) {
    session_start();
}
if (isset($_SESSION["level"]) && $_SESSION["level"] < 2) {
    header("Location: ./index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grrbiel - Usuários</title>
    <?php require "padrao/default.php"; ?>
    <link rel="stylesheet" href="css/users.css">
</head>

<body>
    <?php require "padrao/navbar.php"; ?>
    <div class="div-main full_page-min">
        <div class="div-center">
            <div class="div-width">
                <div class="div-title_margin">
                    <div class="div-title div-center_self">
                        <h1>Usuários</h1>
                    </div>
                    <?php
                    if (isset($_GET['sucess'])) {
                        switch ($_GET['sucess']) {
                            case 'created':
                                echo '<div class="div-message_info sucess_msg">';
                                echo '<div class="message">Salvo com sucesso.</div>';
                                echo '</div>';
                                break;
                            case 'changed':
                                echo '<div class="div-message_info sucess_msg">';
                                echo '<div class="message">Alterado com sucesso.</div>';
                                echo '</div>';
                                break;
                            case 'deleted':
                                echo '<div class="div-message_info sucess_msg">';
                                echo '<div class="message">Deletado com sucesso.</div>';
                                echo '</div>';
                                break;
                        }
                    }
                    ?>
                </div>
                <div class="div-center div-item_margin">
                    <a href="./userconfig">Adicionar usuário +</a>
                </div>
                <div class="div-content">
                    <?php
                    require "sistema/db.php";

                    require "sistema/loadself.php";

                    $sql = "SELECT * FROM slogin WHERE userLevel < " . $_SESSION["level"] . "";
                    $query = mysqli_query($conn, $sql);
                    if (!$query) {
                        echo mysqli_error($conn);
                        exit();
                    }
                    $rows = mysqli_fetch_all($query);
                    for ($i = 0; $i < sizeof($rows); $i++) {
                        echo ('<div class="content_deck">
                        <a href="./userconfig?userID=' . $rows[$i][0] . '" class="content_inside">
                            <div class="content_vside content_topside">
                                ' . $rows[$i][1] . '
                            </div>
                            <div class="content_vside content_botside">
                            ' . $rows[$i][2] . '
                            </div>
                        </a>
                    </div>');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php require "padrao/footer.php"; ?>
</body>