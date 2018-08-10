<!DOCTYPE html>

<html>

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
    <meta http-equiv="refresh" content="15; url=//localhost:8000/member/memberadmin.php">
</head>

<?php

include ('../dbconnect.php');

$sql = "UPDATE member SET Name = ?, TID = ? WHERE ID = ?";
$stmt = $conn->prepare($sql);

$variables = filter_input_array(INPUT_POST, [
    "NName" => ['filter' => FILTER_SANITIZE_STRING],
    "NTID" => ['filter' => FILTER_SANITIZE_NUMBER_INT],
    "NID" => ['filter' => FILTER_SANITIZE_NUMBER_INT],
]);

$stmt->bind_param("sii", $variables['NName'], $variables['NTID'], $variables['NID']);
$stmt->execute();

$success = count($stmt->error_list) <= 0 ?: false;

$sql2 = $conn->query(sprintf("SELECT Name FROM team WHERE ID = %d", $variables['NTID']));

// var_dump($sql2);
$result = $sql2->fetch_assoc();

echo $_POST["NTID"];

if ($success){;?>

<body>

<div class="container">

    <h1>Data Saved</h1>


    <form class="form-inline">
        <div class="form-group has-success has-feedback">
            <label class="control-label" for="inputGroupSuccess3">Saved</label>
            <div class="input-group">
                <span class="input-group-addon">ID</span>
                <input disabled type="text" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" value="<?php echo htmlspecialchars($_POST['NID'])   ?>">
            </div>
            <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
            <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
        </div>
    </form>

    <br>

    <form class="form-inline">
        <div class="form-group has-success has-feedback">
            <label class="control-label" for="inputGroupSuccess3">Saved</label>
            <div class="input-group">
                <span class="input-group-addon">New Name</span>
                <input disabled type="text" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" value="<?php echo htmlspecialchars($_POST['NName'])   ?>">
            </div>
            <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
            <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
        </div>
    </form>

    <br>

    <form class="form-inline">
        <div class="form-group has-success has-feedback">
            <label class="control-label" for="inputGroupSuccess3">Saved</label>
            <div class="input-group">
                <span class="input-group-addon">New Team</span>
                <input disabled type="text" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" value="<?php echo $result['Name'] ;?>">
            </div>
            <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
            <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
        </div>
    </form>

    <br>

    <p>If the redirect dont work <a href=memberadmin.php>click here</a></p>


    <br>

</div>

    <?php } else { ?>

            <br><br><br>
        <div class="container">
            <div class="alert alert-danger" role="alert"><h2>Error ! Could not save the Changes</h2></div>
            <?php echo $_POST['NID']  ?>
            <?php echo $_POST['NName']  ?>
            <?php echo $_POST['NTID']   ?>


           If the redirect dont work <a href=memberadmin.php>click here</a>


        </div>
    <?php } ?>


</body>

</html>
