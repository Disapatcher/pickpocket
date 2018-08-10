<?php

include ('../dbconnect.php');

//Variablen festlegen

$User = $_POST["member-name"];

$Team = $_POST["NTID"];


//Einspeichern

$sql = "INSERT INTO pickpocket.member (name,TID)
Values ('$User','$Team')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: memberadmin.php?success=\"success\"");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: memberadmin.php?error=\"$conn->error\"");
}



$conn->close();

