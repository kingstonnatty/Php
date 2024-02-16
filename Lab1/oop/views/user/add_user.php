<<?php
use db\CreateDB;
require '../db/create_db.php';

if (isset($_POST['db_name'])){
    $db = new CreateDB($_POST['db_name']);
    $result = $db->message;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Database</title>
</head>

<body>
    <h1>Add User </h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <?php if(isset($result)){echo $result;} ?><br>
        DB Name: <input type="text" name="db_name" id=""><br><br>
        <input type="submit" value="Create DB">
    </form>

    <br><br>
    <a href="../install.php">Go Back</a>
</body>

</html>

