<?php

include ('../dbconnect.php');
//require '../dbConnector.php';

//$conn = new dbConnector("localhost", "root", "root", "pickpocket");

$action = $_GET['action'];

switch ($action) {
    case "team_member_remove":
        $memberId = $_GET['user_id'];
        $conn->getConnection()->query(sprintf("UPDATE member SET TID = 0 WHERE ID = %d", $memberId));
        break;

    default:
        break;
}

//Variablen festlegen

$teamId = $_GET['team_id'];

//Get Infos

$sql = sprintf("SELECT team.ID AS TID, team.Name AS TName, member.ID, member.Name AS MemberName FROM `team` INNER JOIN `member` ON member.TID = team.ID WHERE team.ID = %d", $teamId);
$results = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);


$sql2 = sprintf("SELECT * FROM `team` WHERE ID=%d", $teamId);
$result2 = $conn->query($sql2)->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <title>Teamadministration-Pickpocket</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php include('../navbar.html') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1> Team : <?php echo $result2['Name'] ?> </h1>

            <form action="save_team.php" method="post">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1">ID</span>
                    <input disabled type="text" class="form-control" value="<?php echo $teamId ?>" aria-describedby="sizing-addon1" >
                </div>

                <br>

                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1">Name</span>
                    <input type="text" class="form-control" value="<?php echo $result2['Name'] ?>" aria-describedby="sizing-addon1" name="NTName" >
                </div>
                <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    if (0 < count($results)) {
                        // output data of each row
                        foreach ($results as $currentResult) {
                            echo "<tr>";
                            echo "<td>";
                            echo $currentResult['ID'];
                            echo "</td>";
                            echo "<td>";
                            echo $currentResult['MemberName'];
                            echo "</td>";
                            echo "<td>";
                            //action
                            $id = $currentResult['ID'];
                            echo "<a class='btn btn-danger' href='edit_team.php?action=team_member_remove&team_id=$teamId&user_id=$id'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td>No Member in this Team</td></tr>";
                    }

                    ?>
                    </tbody>

                </table>

            </form>

        </div>

    </div>

    <div class="row">
        <div class="col-md-12">


        </div>


    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>