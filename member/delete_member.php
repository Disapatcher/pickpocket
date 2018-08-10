<?php

include ('../dbconnect.php');

//Variablen festlegen

$user_id = $_POST["NID"];
//Einspeichern

$sql = "DELETE FROM pickpocket.member WHERE ID={$user_id}";

if ($conn->query($sql) === TRUE)
{
    ?>
    <br><br><br>
    <div class="container">
        <div class="alert alert-success" role="alert">
            <a href="#" class="alert-link">Successful Deleted</a>
        </div>
    </div>
    <?php
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>
<!DOCTYPE html>
<html>

<head>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Memberadministration-Pickpocket</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta http-equiv="refresh" content="5; url=//localhost:8000/member/memberadmin.php">

</head>

</html>
