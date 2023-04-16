<?php
    session_start();
    require_once "./core/connection.php";
    require_once "./core/functions.php";
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        //dd($_POST);
        $id = $_POST['id'];
        $name = $_POST['name'];
        $debt = $_POST['debt'];
        $sql = "UPDATE my SET name='$name',debt=$debt WHERE id=$id";
        if(mysqli_query($connect,$sql)){
            $_SESSION["status"] = [
                'message' => "List updated successfully"
            ];
            header("Location:list-index.php");
        }

         
    }

?>