<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($mysqli, "DELETE FROM addmember WHERE idmember=$id");

    header("Location: index.php");
}
?>