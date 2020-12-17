<?php
if (session_status() != 2) {
    session_start();
}
if (isset($_SESSION["level"]) && $_SESSION["level"] < 1) {
    header("Location: ./index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grrbiel - Produtos</title>
    <?php require "padrao/default.php"; ?>
    <link rel="stylesheet" href="css/products.css">
</head>

<body>
    <?php require "padrao/navbar.php"; ?>
    <div class="div-main full_page-min">
        <div class="div-center">
            <div class="div-width">
                <div class="div-title_margin">
                    <div class="div-title div-center_self">
                        <h1>Produtos</h1>
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
                    <a href="./produconfig">Adicionar item +</a>
                </div>
                <div class="div-content div-center">
                    <?php
                    require_once "sistema/db.php";
                    $sql = "SELECT * FROM stenis";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        echo "ERROR SQL";
                        exit();
                    }
                    $row = mysqli_fetch_all($result);

                    for ($i = 0; $i < sizeof($row); $i++) {
                        $split = explode(",", $row[$i][3]);
                        $gender = ["Masculino", "Feminino", "Unisex"];
                        $sex = $gender[$row[$i][5]];
                        echo ('
                    <div class="content_padding ">
                        <a class="content_acess" href="./produconfig?tenisID=' . $row[$i][0] . '">
                            <img src="imgs/database/' . $split[0] . '" alt="">
                            <div class="content_desc">
                                <div class="content_desc-inner content_desc-left">
                                    <div class="content_desc-name">' . $row[$i][1] . '</div>
                                </div>
                                <div class="content_desc-inner content_desc-right">
                                    <div class="content_info-sub">
                                        ' . $sex . '
                                    </div>
                                    <div class="content_info-sub">
                                        $' . $row[$i][4] . '
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>');
                    };
                    ?>
                </div>
            </div>
        </div>
</body>

</html>