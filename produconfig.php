<?php
if (session_status() != 2) {
    session_start();
}
if (isset($_SESSION["level"]) && $_SESSION["level"] < 1) {
    header("Location: ./products");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grrbiel - Configurações do Produto</title>
    <?php require "padrao/default.php"; ?>
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <?php require "padrao/navbar.php"; ?>
    <div class="div-main full_page-min">
        <div class="div-center">
            <div class="div-width">
                <section id="section-signup" class="signup">
                    <div class="div-title_margin">
                        <div class="div-title div-center_self">
                            <?php
                            if (isset($_GET["tenisID"]) && $_GET["tenisID"] != "new") {
                                echo '<h1>ALTERAR PRODUTO</h1>';
                            } else {
                                echo '<h1>ADICIONAR PRODUTO</h1>';
                            }
                            ?>
                        </div>
                        <?php
                        if (isset($_GET['error'])) {
                            switch ($_GET['error']) {
                                case 'sqlQuery':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message ">Erro, tente novamente.</div>';
                                    echo '</div>';
                                    break;
                                case 'alreadyExist':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">Produto já cadastrado.</div>';
                                    echo '</div>';
                                    break;
                                case 'notExist':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">Produto não existe.</div>';
                                    echo '</div>';
                                    break;
                            }
                        }
                        ?>
                    </div>
                    <div class="div-center">
                        <form class="form-main form-prodcfg" enctype="multipart/form-data" id="form-prodcfg" method="POST" action="./sistema/product.php" onsubmit="return validate()">
                            <?php
                            if (isset($_GET["tenisID"]) && $_GET["tenisID"] != "new") {
                                echo '<input type="hidden" name="tenisID" id="hide-id" value="' . $_GET["tenisID"] . '">';
                            }
                            ?>
                            <div class="input_padding input_image">
                                <input type="file" class="input_image-file" name="image1" id="image1" onchange="loadName('image1','img_selector1')" accept="image/x-png,image/jpeg" style="display: none;">
                                <label class="input_default input_label" id="img_selector1" for="image1">1. Selecionar imagem - Principal</label>
                            </div>
                            <div class="input_padding input_image">
                                <input type="file" class="input_image-file" name="image2" id="image2" onchange="loadName('image2','img_selector2')" accept="image/x-png,image/jpeg" style="display: none;">
                                <label class="input_default input_label" id="img_selector2" for="image2">2. Selecionar imagem (Opcional)</label>
                            </div>
                            <div class="input_padding input_image">
                                <input type="file" class="input_image-file" name="image3" id="image3" onchange="loadName('image3','img_selector3')" accept="image/x-png,image/jpeg" style="display: none;">
                                <label class="input_default input_label" id="img_selector3" for="image3">3. Selecionar imagem (Opcional)</label>
                            </div>
                            <div class="input_padding input_image">
                                <input type="file" class="input_image-file" name="image4" id="image4" onchange="loadName('image4','img_selector4')" accept="image/x-png,image/jpeg" style="display: none;">
                                <label class="input_default input_label" id="img_selector4" for="image4">4. Selecionar imagem (Opcional)</label>
                            </div>
                            <div class="input_padding">
                                <input class="input_default input_text input_check" id="tenisName" type="text" name="tenisName" placeholder="Nome do tenis">
                            </div>
                            <div class="input_padding">
                                <textarea class="input_default input_text input_text-area" id="tenisDesc" name="tenisDesc" rows="10" placeholder="Descrição (Opcional)"></textarea>
                            </div>
                            <div class="input_padding">
                                <input class="input_default input_text input_check" type="number" id="tenisPrice" name="tenisPrice" placeholder="Preço (Ex: 99,90)">
                            </div>
                            <input type="hidden" name="tenisGender" id="hide-gender">
                            <div class="input_padding input_padding-nowrap">
                                <div class="input_padding-inner">
                                    <input class="input_default input_button" type="button" id="button-male" name="gender-male" value="Masculino">
                                </div>
                                <div class="input_padding-inner">
                                    <input class="input_default input_button" type="button" id="button-female" name="gender-female" value="Feminino">
                                </div>
                                <div class="input_padding-inner">
                                    <input class="input_default input_button" type="button" id="button-unisex" name="gender-unisex" value="Unisex">
                                </div>
                            </div>
                            <div class="input_padding input_padding-nowrap">
                                <div class="input_padding-inner">
                                    <?php
                                    if (isset($_GET["tenisID"]) && $_GET["tenisID"] != "new") {
                                        echo '<input class="input_default input-submit" type="submit" name="change-submit" value="ALTERAR">';
                                    } else {
                                        echo '<input class="input_default input-submit" type="submit" name="save-submit" value="SALVAR">';
                                    }
                                    ?>
                                </div>
                                <div class="input_padding-inner">
                                    <input class="input_default input-submit" type="submit" id="delete-submit" name="delete-submit" value="DELETAR">
                                </div>
                            </div>

                        </form>
                    </div>
                    <p class="message-gray div-center_self">
                        Quer voltar? <a href="./users">Clique aqui</a>
                    </p>
                </section>
            </div>
        </div>
    </div>
    <script src="js/imgloader.js"></script>
    <script src="js/validationprod.js"></script>
    <?php
    if (isset($_GET["tenisID"]) && $_GET["tenisID"] != "new") {
        require "sistema/db.php";
        require "sistema/loadprod.php";
    }
    require "padrao/footer.php";
    ?>
</body>