<?php

include ('../dbconnect.php');

$user_id = $_GET["user_id"];
//Einspeichern

$sql = "SELECT member.ID, member.Name, member.TID, team.Name as TName  FROM member LEFT JOIN team ON member.TID = team.ID WHERE member.ID=$user_id";

$result = $conn->query($sql)->fetch_assoc();
$user_tid = $result['TID'];

$sql2 = "SELECT * FROM `team` WHERE NOT ID=$user_tid";
$result2 = $conn->query($sql2);

?>

<!DOCTYPE html>
<html>

<head>
    <script src="../js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">z
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Memberadministration-Pickpocket</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php include('../navbar.html') ?>

<div class="container">

<h1> User : <?php echo $result["Name"] ?> </h1>

<form action="save_member.php" method="post">

    <p hidden> <input type="text" class="form-control" value="<?php echo $result["ID"] ?>" aria-describedby="sizing-addon1" name="NID">  </p>

    <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1">ID</span>
        <input disabled type="text" class="form-control" value="<?php echo $result["ID"] ?>" aria-describedby="sizing-addon1" >
    </div>
    <br>

    <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1">Name</span>
        <input type="text" class="form-control" value="<?php echo $result["Name"] ?>" aria-describedby="sizing-addon1" name="NName" >
    </div>
    <br>

    <select class="form-control input-lg" name="NTID" >

        <?php
        if ($result2->num_rows > 0) {
        // output data of each row
        while($result3 = $result2->fetch_assoc()) { ?>


            <option value="<?php echo $result3['ID'] ;?>" name="NTID" >   <?php echo  $result3['Name'] ; } ?> </option> <?php } ?>
            <option selected value="<?php echo $user_tid ;?>" ><?php echo $result['TName'] ;?></option>

    </select>

    <br>
    <br>
    <button type="submit" class="btn btn-primary btn-lg">Edit</button>

</form>


</html>
