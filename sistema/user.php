<?php
if (session_status() != 2) {
    session_start();
}
if (isset($_SESSION["level"]) && $_SESSION["level"] < 2) {
    header("Location: ../users");
}

if (isset($_POST["save-submit"]) || isset($_POST["change-submit"])) {

    //Requisita o banco de dados
    require "db.php";

    //Salvar as variaveis
    $name = $_POST["userName"];
    $email = $_POST["userEmail"];
    $pwd = $_POST["userPwd"];
    $gender = $_POST["userGender"];
    $level = $_POST["userLevel"];

    //Caso seja pressionado o botão de alterar (USUARIO NOVO)
    if (isset($_POST["save-submit"])) {

        //Caso a prioridade definida para o usuário seja maior que a do criador
        if ($level > $_SESSION["level"]) {
            header("Location: ../userconfig?error=priorityUser");
            exit();
        }

        //Detectar se o usuário existe
        $sql = 'SELECT * FROM slogin WHERE userEmail = "' . $email . '"';
        $query = mysqli_query($conn, $sql);

        //Detecção de erros da query
        if (!$query) {
            header("Location: ../userconfig?error=sqlQuery");
            exit();
        }

        //Caso exista um usuário ele retorna
        $row = mysqli_fetch_row($query);
        if (sizeof($row) > 0) {
            header("Location: ../userconfig?error=alreadyExist");
            exit();
        }

        //Codifica a senha
        $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);

        //Pesquisa SQL para inserir o novo usuario
        $sql = 'INSERT INTO slogin (userName, userEmail, userPwd, userGender, userLevel)
        VALUES ( "' . $name . '", "' . $email . '", "' . $pwdHash . '", "' . $gender . '", "' . $level . '") ';

        //Query
        $query = mysqli_query($conn, $sql);

        //Detecção de erros da query
        if ($query) {
            header("Location: ../users?sucess=created");
        } else {
            echo "ERROR QUERY - SAVE" . "<br>";
            echo mysqli_error($conn);
        }
    }

    //Caso seja pressionado o botão de alterar (USUARIO JÁ EXISTIA)
    elseif (isset($_POST["change-submit"])) {

        //Pega o ID do usuário
        $id = $_POST["userID"];

        //Caso a prioridade definida para o usuário seja maior que a do criador
        if ($level > $_SESSION["level"]) {
            header("Location: ../userconfig?userID=" . $id . "&error=priorityUser");
            exit();
        }

        //Detectar se o usuário existe
        $sql = 'SELECT * FROM slogin WHERE userID = ' . $id . '';
        $query = mysqli_query($conn, $sql);

        //Detecção de erros da query
        if (!$query) {
            header("Location: ../userconfig?userID=" . $id . "&error=sqlQuery");
            exit();
        }
        //Caso não exista nenhum usuário ele retorna
        $row = mysqli_fetch_row($query);
        if (sizeof($row) <= 0) {
            header("Location: ../userconfig?userID=" . $id . "&error=notExist");
            exit();
        }

        if ($pwd == $row[3]) {
            //Pesquisa SQL para alterar o usuario (NÃO ALTERA A SENHA)
            $sql = 'UPDATE slogin
            SET userName = "' . $name . '", userEmail = "' . $email . '", userGender="' . $gender . '", userLevel = "' . $level . '"
            WHERE userID = ' . $id . '';
        } else {
            //Codifica a senha
            $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);

            //Pesquisa SQL para alterar o usuario (TAMBÉM ALTERA A SENHA)
            $sql = 'UPDATE slogin
            SET userName = "' . $name . '", userEmail = "' . $email . '", userPwd = "' . $pwdHash . '", userGender="' . $gender . '", userLevel = "' . $level . '"
            WHERE userID = ' . $id . '';
        }



        //Query
        $query = mysqli_query($conn, $sql);

        //Detecção de erros da query
        if ($query) {
            header("Location: ../users?sucess=changed");
        } else {
            header("Location: ../userconfig?userID=" . $id . "&error=sqlQuery");
            exit();
        }
    }
    
    //Tratamento de erros
    else {
        header("Location: ../users");
    }

} elseif (isset($_POST["delete-submit"])) {

    //Requisita o banco de dados
    require "db.php";

    //Pega o ID do usuário
    $id = $_POST["userID"];

    //Pesquisa para deletar do SQL
    $sql = 'DELETE FROM slogin WHERE userID = ' . $id . '';

    //Query
    $query = mysqli_query($conn, $sql);

    //Detecção de erros da query
    if (!$query) {
        header("Location: ../userconfig?userID=" . $id . "&error=sqlQuery");
        exit();
    }
    header("Location: ../users?sucess=deleted");
}
//Tratamento de erros
else {
    header("Location: ../users");
}
