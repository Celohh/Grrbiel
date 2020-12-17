<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grrbiel - Inicio</title>
    <?php require "padrao/default.php"; ?>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php require "padrao/navbar.php"; ?>
    <div class="div-main full_page-min">
        <header class="div-center"><img src="imgs/header.png" alt=""></header>
        <div class="div-center">
            <div class="div-width">
                <?php
                require "sistema/db.php";
                $sql = "SELECT * FROM stenis";
                $gender = ["Masculino", "Feminino", "Unisex"];
                $title = "";
                if (isset($_GET['parameter']) and $_GET['parameter'] != "") {
                    switch ($_GET['parameter']) {
                        case "men":
                            $title = "Masculinos";
                            $sql = "SELECT * FROM stenis WHERE tenisSex != 1";
                            break;
                        case "women":
                            $title = "Femininos";
                            $sql = "SELECT * FROM stenis WHERE tenisSex != 0";
                            break;
                        case "lastr":
                            $title = "Ultimos Lançamentos";
                            $sql = "SELECT * FROM stenis";
                            break;
                    }
                }
                $query = mysqli_query($conn, $sql);
                if (!$query) {
                    echo mysqli_error($conn);
                    exit();
                }
                $rows = mysqli_fetch_all($query);
                require "sistema/loadcontent.php";

                ?>
            </div>
        </div>
    </div>
    </div>
    <?php
    if (isset($_GET["sucess"])) {
        $sucess = $_GET["sucess"];
        if ($sucess == "logged" || $sucess == "accCreated") {
        echo ('<div class="div_fixed-bg" id="fixed">
        <div class="div_fixed-center">
        <div class="div_fixed-content">');
        if ($sucess == "logged") {
            echo '<div>Logado com <span class="sucess_color">sucesso</span>!</div>';
        }
        if ($sucess == "accCreated") {
            echo '<div class="div_fixed-item">Conta criada com <span class="sucess_color">sucesso</span>!</div>';
            echo '<div class="div_fixed-item">Efetue o login para entrar.</div>';
        }
        echo ('<div class="div_fixed-item"><button id="ok-btn">OK</button></div>');
        echo ('</div>
        </div>
        </div>');
        }
    }
    require "padrao/footer.php";
    ?>
    <script src="js/notification.js"></script>
</body>

</html>