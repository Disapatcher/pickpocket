<?php

include ('../dbconnect.php');

//Variablen festlegen

$Team = $_POST["team-name"];


//Einspeichern

$sql = "INSERT INTO pickpocket.team (name)
Values ('$Team')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: teamadmin.php?success=\"success\"");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: teamadmin.php?error=\"$conn->error\"");
}



$conn->close();

