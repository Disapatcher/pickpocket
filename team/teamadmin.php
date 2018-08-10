<?php

include ('../dbconnect.php');

//Listen

$sql = "SELECT * FROM pickpocket.team ORDER BY `ID` ASC";

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Teamadministration-Pickpocket</title>

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
    <h1>Teamadministration</h1>

    <?php if ($_GET["success"])
    {
        echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
    }
    elseif($_GET["error"])
    {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Error : " . $_GET["error"] . " </div>";
    }
    ?>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Team</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['ID']}</td>";
                echo "<td>{$row['Name']}</td>";
                //action
                    $id = $row['ID'];
                echo "<td><a class='btn btn-info' type='submit' href='edit_team.php?team_id=$id'>Edit</a></td>";
                "</tr>"
                ;

            }
        } else {
            echo "<tr><td>0 results</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Create Team</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">New Team</h4>
                </div>

                <form action="add_team.php" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Team</label>
                            <input type="text" class="form-control" name="team-name" id="team-name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Team</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>

<?php
$conn->close();
?>

</html>