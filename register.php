<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grrbiel - Registro</title>
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
                            <h1>REGISTRAR</h1>
                            <div class="div-subtitle">Se torne um membro</div>
                        </div>
                        <?php
                        if (isset($_GET['error'])) {
                            switch ($_GET['error']) {
                                case 'invalidnameemail':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">Usuário ou E-mail inválido.</div>';
                                    echo '</div>';
                                    break;
                                case 'useralreadyexists':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">Usuário já cadastrado.</div>';
                                    echo '</div>';
                                    break;
                                case 'emailalreadyexists':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">E-mail já cadastrado.</div>';
                                    echo '</div>';
                                    break;
                                case 'sqlquery':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">Erro, tente novamente.</div>';
                                    echo '</div>';
                                    break;
                            }
                        }
                        ?>
                    </div>
                    <div class="div-center">
                        <form class="form-main" id="form-sign" method="POST" action="sistema/signup.php" onsubmit="return validate('sign')">
                            <div class="input_padding">
                                <input class="input_default input_text input_sign" id="input_text" type="email" name="email" placeholder="E-mail">
                            </div>
                            <div class="input_padding">
                                <input class="input_default input_text input_sign" type="password" name="password" placeholder="Senha">
                            </div>
                            <div class="input_padding">
                                <input class="input_default input_text input_sign" type="text" name="username" placeholder="Nome">
                            </div>
                            <div class="input_padding input_padding-nowrap">
                                <div class="input_padding-inner">
                                    <input class="input_default" type="button" id="button-male" name="gender-male" value="Homem">
                                </div>
                                <input type="hidden" name="gender" id="hide-gender">
                                <div class="input_padding-inner">
                                    <input class="input_default" type="button" id="button-female" name="gender-female" value="Mulher">
                                </div>
                            </div>
                            <p class="message-gray div-center_self">
                                Ao criar uma conta, você concorda com a Política de Privacidade e Termos de Uso de grrbiel.
                            </p>
                            <div class="input_padding">
                                <input class="input_default input-submit" type="submit" name="signup-submit" value="REGISTRAR">
                            </div>

                        </form>
                    </div>
                    <p class="message-gray div-center_self">
                        Já tem uma conta? <a id="signup-to-login">Entre</a>
                    </p>

                </section>
                <section id="section-login" class="login section-hide">
                    <div class="div-title_margin">
                        <div class="div-title div-center_self">
                            <h1>LOGIN</h1>
                        </div>
                        <?php
                        if (isset($_GET['error'])) {
                            switch ($_GET['error']) {
                                case 'userincorrect':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">Usuário incorreto.</div>';
                                    echo '</div>';
                                    break;
                                case 'usernotfound':
                                    echo '<div class="div-message_info error_msg">';
                                    echo '<div class="message">Usuário não encontrado.</div>';
                                    echo '</div>';
                                    break;
                            }
                        }
                        ?>
                    </div>
                    <div class="div-center">
                        <form class="form-main" id="form-login" method="POST" action="sistema/login.php" onsubmit="return validate('login')">
                            <div class="input_padding ">
                                <input class="input_default input_text input_login" type="email" name="email" placeholder="E-mail">
                            </div>
                            <div class="input_padding">
                                <input class="input_default input_text input_login" type="password" name="password" placeholder="Senha">
                            </div>
                            <p class="message-gray div-center_self">
                                Ao fazer login, você concorda com a Política de Privacidade e Termos de Uso de grrbiel.
                            </p>
                            <div class="input_padding">
                                <input class="input_default input-submit" type="submit" name="login-submit" value="ENTRAR">
                            </div>
                        </form>
                    </div>
                    <p class="message-gray div-center_self">
                        Não tem uma conta? <a id="login-to-signup">Crie uma</a>
                    </p>
                </section>
            </div>
        </div>
    </div>
    <script src="js/register.js"></script>
    <script src="js/validation.js"></script>
    <?php require "padrao/footer.php"; ?>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "userincorrect" or $_GET['error'] == "usernotfound") {
            echo ('
            <script>
            document.getElementById("signup-to-login").click();
            </script>
            ');
        }
    }
    ?>
</body>