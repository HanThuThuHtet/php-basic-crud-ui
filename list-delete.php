<?php

    require_once './core/connection.php';
    require_once './core/functions.php';
     //dd($_GET);
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $id = $_POST["id"];
        $sql = "DELETE FROM my WHERE id=$id";
        if(mysqli_query($connect,$sql)){
            header("Location:list-index.php");
        }
    }

?>