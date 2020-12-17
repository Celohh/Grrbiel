<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require "sistema/db.php";
    $id = $_GET['tenisID'];
    $sql = 'SELECT * FROM stenis WHERE tenisID = ' . $id . '';
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        echo mysqli_error($conn);
        exit();
    }
    $row = mysqli_fetch_row($query);
    echo ('<title>Grrbiel - '.$row[1].'</title>')
    ?>
    <?php require "padrao/default.php"; ?>
    <link rel="stylesheet" href="css/product.css">
</head>

<body>
    <?php require "padrao/navbar.php"; ?>
    <div class="div-main full_page-min">
        <div class="div-center">
            <div class="div-width">
                <div class="div-center div-content">
                    <div class="div-hside div-hside_left">
                        <?php
                        $images = explode(",", $row[3]);
                        for ($i = 0; $i < sizeof($images); $i++) {
                            echo ('<div class="image_padding">
                            <img src="imgs/database/' . $images[$i] . '" alt="">
                            </div>');
                        }
                        $gender = ["Masculino","Feminino","Unisex"]
                        ?>
                    </div>
                    <div class="div-hside div-hside_right">
                        <div class="content_topside">
                            <div class="content_vside content-text_center">
                                <div class="content_space">
                                    <?php echo ('<span>'.$gender[$row[5]].'</span>'); ?>
                                    <?php echo ('<span>$'.$row[4].'</span>'); ?>
                                </div>
                            </div>
                            <div class="content_vside">
                                <span>
                                <?php echo ('<h3>'.$row[1].'</h3>'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="content_midside">
                            <div class="content_vside content_buttons content-text_center">
                                <button class="btn-content btn-buy">Adicionar ao carrinho</button>
                            </div>
                            <div class="content_vside content_buttons content-text_center">
                                <button class="btn-content btn-fav">Salvar</button>
                            </div>
                        </div>
                        <?php
                        if ($row[2] != "") {
                        echo ('<hr class="content_gray">
                        <div class="content_botside content_vside">
                            <div class="content_vside">
                                <p class="content_gray">
                                    '.$row[2].'
                                </p>
                            </div>
                        </div>');
                    }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "padrao/footer.php"; ?>
</body>