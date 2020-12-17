<?php
if (session_status() != 2) {
    session_start();
}
if (isset($_SESSION["level"]) && $_SESSION["level"] < 1) {
    header("Location: ../products");
}

if (isset($_POST["save-submit"]) || isset($_POST["change-submit"])) {
    $images = [];

    //Loop for para detectar os 4 input:file
    for ($i = 1; $i <= 4; $i++) {

        //Variável para conseguir atingir todos os input:file
        $idImages = strval("image" . strval($i));

        //Detecta se foram feito o upload de novas imagens
        if (is_uploaded_file($_FILES[$idImages]['tmp_name'])) {

            //Detecta se as extensões são permitidas
            $extensions = array("png", "jpeg", "jpg");
            $finalExtension = pathinfo($_FILES[$idImages]['name'], PATHINFO_EXTENSION);

            //Caso seja permitido puxa as imagens e salva na pasta database
            if (in_array($finalExtension, $extensions)) {
                $tmpName = $_FILES[$idImages]['tmp_name'];
                $name = uniqid() . ".$finalExtension";
                $dest = "../imgs/database/";
                $moved = move_uploaded_file($tmpName, $dest . $name);

                //Salva o nome das imagens em uma array
                array_push($images, $name);
            }
        }
    }
    //Detectar se a imagem existe
    $imagesExist = false;
    if (sizeof($images) > 0) {
        $imagesExist = true;
        //Converte a array em uma string
        $images = implode(',', $images);
    }

    //Salvar as variaveis
    $name = $_POST["tenisName"];
    $desc = $_POST["tenisDesc"];
    $price = $_POST["tenisPrice"];
    $gender = $_POST["tenisGender"];

    //Requisita o banco de dados
    require "db.php";

    //Se o botão pressionado foi o de salvar (ITEM NOVO)
    if (isset($_POST["save-submit"])) {

        //Faz uma busca SQL
        $sql = "SELECT tenisName FROM stenis WHERE tenisName == '$name'";
        $query = mysqli_query($conn, $sql);

        //Caso a query falhe
        if (!$query) {
            header("Location: ../produconfig?error=sqlQuery");
            exit();
        }

        //Detecta se o item já existe
        $result = mysqli_fetch_row($query);
        if (sizeof($result) > 0) {
            header("Location: ../produconfig?error=alreadyExist");
            exit();
        }

        //Pesquisa SQL para inserir o novo produto
        $sql = 'INSERT INTO stenis (tenisName, tenisDesc, tenisImg, tenisPrice, tenisSex)
        VALUES ( "' . $name . '", "' . $desc . '", "' . $images . '", "' . $price . '", "' . $gender . '") ';
        $query = mysqli_query($conn, $sql);

        //Detecção de erros da query
        if ($query) {
            header("Location: ../products?sucess=created");
        } else {
            header("Location: ../produconfig?error=sqlQuery");
            exit();
        }

    //Se o botão pressionado foi o de alterar (ITEM JÁ EXISTIA)
    } else {

        //Pega o ID do item
        $id = $_POST["tenisID"];

        //Detecta se o produto já existe
        $sql = "SELECT * FROM stenis WHERE tenisID = '$id'";
        $query = mysqli_query($conn, $sql);

        //Detecção de erros da query
        if ($query) {
            $row = mysqli_fetch_row($query);
            if (sizeof($row) <= 0) {
                header("Location: ../produconfig?error=notExist");
                exit();
            }
        } else {
            header("Location: ../produconfig?error=sqlQuery");
            exit();
        }

        //Detecta se foi feito o upload de novas imagens
        if ($imagesExist) {

            //Faz a exclusão das antigas imagens
            $row = mysqli_fetch_row($query);
            $split = explode(",", $row[3]);
            if (file_exists("../imgs/database/" . $split[0])) {
                for ($i = 0; $i < sizeof($split); $i++) {
                    unlink("../imgs/database/" . $split[$i]);
                }
            }

            //Altera o produto já existente (também altera as imagens)
            $sql = 'UPDATE stenis
            SET tenisName = "' . $name . '", tenisDesc = "' . $desc . '", tenisImg = "' . $images . '", tenisPrice="' . $price . '", tenisSex = "' . $gender . '"
            WHERE tenisID = "' . $id . '"';
            //Caso não tenha sido feito o upload de novas imagens
        } else {

            //Altera o produto já existente (não altera as imagens)
            $sql = 'UPDATE stenis
            SET tenisName="' . $name . '", tenisDesc="' . $desc . '", tenisPrice="' . $price . '", tenisSex="' . $gender . '"
            WHERE tenisID = ' . $id . '';
        }

        //Faz o upload e detecta o erros
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location: ../products?sucess=changed");
        } else {
            header("Location: ../produconfig?error=sqlQuery");
            exit();
        }
    }
} elseif (isset($_POST["delete-submit"])) {

    //Pega o ID do item
    $id = $_POST["tenisID"];

    //Requisita o banco de dados e cria a pesquisa
    require "db.php";
    $sql = 'SELECT tenisImg FROM slogin WHERE tenisID = ' . $id . '';
    
    //Query
    $query = mysqli_query($conn, $sql);

    //Detecção de erros da query
    if (!$query) {
        header("Location: ../produconfig?error=sqlQuery");
        exit();
    }

    //Detectar se o produto de fato existe
    $row = mysqli_fetch_row($query);
    if (sizeof($row) <= 0) {
        header("Location: ../produconfig?error=notExist");
    }

    //Excluir as imagens do produto (DESCOUPAR MEMÓRIA)
    $images = explode(",",$row[0]);
    for($i = 0; $i < sizeof($images); $i++) {
        if (file_exists("../imgs/database/".$images[$i])) {
            unlink("../imgs/database/".$images[$i]);
        }
    }

    //Pesquisa para deletar do SQL
    $sql = 'DELETE FROM stenis WHERE tenisID = '.$id.'';
    
    //Query
    $query = mysqli_query($conn,$sql);

    //Detecção de erros da query
    if (!$query) {
        header("Location: ../produconfig?error=sqlQuery");
        exit();
    }
    header("Location: ../products?sucess=deleted");

} else {
    header("Location: ../products");
}
