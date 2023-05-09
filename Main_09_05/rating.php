<?php
    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        header("Location: /login/login.html ");        
    }
    include './connectionDB.php';
    session_start();
    $ricetta = $_POST['titolo'];
    $recensito = $_POST['utente'];
    $recensore = $_SESSION['username'];
    $stelle = $_POST['stars'];
    $commento = $_POST['recensione'];

    $query = "INSERT INTO recensioni VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($dbconn, $query, array($ricetta, $recensore, $recensito, $stelle, $commento));

    if($result) {
        echo "<script> alert(\"Review inserted successfully!\"); </script>";
        header("Location: ./Homepage.php");
    }
    else {
        echo "<script> alert(\"Failed to upload recipe! :(\"); </script>";
    }

    $query2 = "UPDATE utenti SET recensioni = recensioni + 1 WHERE username = $1";
    $result2 = pg_query_params($dbconn, $query2, array($_SESSION['username']));

    if(!$result2) {
        echo "<script> alert(\"Failed to update user stats\"); </script>";
    }

    pg_close($dbconn);
?>