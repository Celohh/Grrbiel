<?php
if (session_status() != 2) {
    session_start();
}
if (isset($_SESSION["level"]) && $_SESSION["level"] < 2) {
    header("Location: ./users");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grrbiel - Configurações do Usuário</title>
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
                            if (isset($_GET["userID"]) && $_GET["userID"] != "new") {
                                echo '<h1>ALTERAR USUÁRIO</h1>';
                            } else {
                                echo '<h1>ADICIONAR USUÁRIO</h1>';
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
                                case 'priorityUser':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">Prioridade inválida.</div>';
                                    echo '</div>';
                                    break;
                                case 'alreadyExist':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">E-mail já cadastrado.</div>';
                                    echo '</div>';
                                    break;
                                case 'notExist':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">Usuário não existe.</div>';
                                    echo '</div>';
                                    break;
                            }
                        }
                        ?>
                    </div>
                    <div class="div-center">
                        <form class="form-main form-usercfg" id="form-sign" method="POST" action="sistema/user.php" onsubmit="return validate('sign')">
                            <?php
                            if (isset($_GET["userID"]) && $_GET["userID"] != "new") {
                                echo '<input type="hidden" name="userID" id="hide-id" value="' . $_GET["userID"] . '">';
                            }
                            ?>
                            <div class="input_padding">
                                <input class="input_default input_text input_check" type="text" id="userName" name="userName" placeholder="Nome">
                            </div>
                            <div class="input_padding">
                                <input class="input_default input_text input_check" type="email" id="userEmail" name="userEmail" placeholder="E-mail">
                            </div>
                            <div class="input_padding">
                                <input class="input_default input_text input_check" type="password" id="userPwd" name="userPwd" placeholder="Senha">
                            </div>
                            <div class="input_padding input_padding-nowrap">
                                <div class="input_padding-inner">
                                    <input class="input_default input_button" type="button" id="button-male" name="gender-male" value="Homem">
                                </div>
                                <input type="hidden" name="userGender" id="hide-gender">
                                <div class="input_padding-inner">
                                    <input class="input_default input_button" type="button" id="button-female" name="gender-female" value="Mulher">
                                </div>
                            </div>
                            <div class="input_padding">
                                <input class="input_default input_text input_check" type="number" id="userLevel" name="userLevel" placeholder="Prioridade">
                            </div>
                            <div class="input_padding input_padding-nowrap">
                                <div class="input_padding-inner">
                                    <?php
                                    if (isset($_GET["userID"]) && $_GET["userID"] != "new") {
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
    <script src="js/register.js"></script>
    <script src="js/validationuser.js"></script>
    <?php
    if (isset($_GET["userID"]) && $_GET["userID"] != "new") {
        require "sistema/db.php";
        require "sistema/loaduser.php";
    }
    require "padrao/footer.php"; ?>
</body>