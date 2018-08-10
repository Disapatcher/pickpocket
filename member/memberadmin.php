<?php


include ('../dbconnect.php');

// Befehle

$sql = "SELECT `member`.`ID`,`member`.Name,`team`.`Name` AS 'Teamname' FROM `member`LEFT JOIN `team` ON `member`.`TID` = `team`.`ID`";

$result = $conn->query($sql);

$sql2 = "SELECT * FROM `team`";

$result2 = $conn->query($sql2);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Memberadministration-Pickpocket</title>

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
    <h1>Memberadministration</h1>
</div>

<br>
<br>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>

<div class="container">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nmember" data-whatever="@mdo">New Member</button>
    <div class="modal fade" id="nmember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">New Member</h4>
                </div>
                <form action="add_member.php" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Name</label>
                            <input type="text" class="form-control" name="user-name" id="user-name">
                        </div>

                        <select class="form-control input-lg" name="NTID" >

                            <?php
                            if ($result2->num_rows > 0) {
                                // output data of each row
                                while($result3 = $result2->fetch_assoc()) { ?>


                                    <option value="<?php echo $result3['ID'] ;?>" name="NTID"> <?php echo  $result3['Name'] ; } ?> </option> <?php } ?>

                        </select>
                        <!--
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Team</label>
                            <input type="text" class="form-control" name="team-name" id="team-name">
                        </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>
    <br>

    <?php if (isset($_GET["success"]))
        {
        echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
        }
    elseif (isset($_GET["error"]))
        {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Error : " . $_GET["error"] . " </div>";
        }
    ?>

    <br>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Team</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                <?php

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        echo "<tr>";
                            echo "<td>";
                                echo $row['ID'];
                            echo "</td>";
                            echo "<td>";
                                echo $row['Name'];
                            echo "</td>";
                            echo "<td>";
                                echo $row['Teamname'];
                            echo "</td>";
                            echo "<td>";
                                //action
                                $id = $row['ID'];
                                echo "<a class='btn btn-info' href='edit_member.php?user_id=$id'>Edit</a>";
                            echo "</td>";
                        echo "</tr>";

                    }
                } else {
                    echo "<tr><td>0 results</td></tr>";
                }

                ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nmember" data-whatever="@mdo">New Member</button>


    <?php
    $conn->close();
    ?>

</div>
</div>
</body>
</html>