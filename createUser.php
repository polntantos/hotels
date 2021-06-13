<?php
require 'dbconf.php';
if (isset($_POST["fname"])) {
    $newfname = htmlspecialchars($_POST["fname"]);
}
if (isset($_POST["lname"])) {
    $newlname = htmlspecialchars($_POST["lname"]);
}
if (isset($_POST["email"])) {
    $newemail = htmlspecialchars($_POST["email"]);
}
if (isset($_POST["passwd"]) && isset($_POST["confirmpswd"]) && $_POST["passwd"] == ($_POST["confirmpswd"])) {
    $newpasswd = htmlspecialchars_decode(trim($_POST["passwd"]));
}
$newpasswd = password_hash($newpasswd, PASSWORD_DEFAULT);
if (isset($newfname) && isset($newlname) && isset($newemail) && isset($newpasswd)) {
    $sql = "INSERT INTO `mydb`.`user` (`fname`, `lname`, `email`, `password`, `create_time`) VALUES ('" . $newfname . "', '" . $newlname . "', '" . $newemail . "', '" . $newpasswd . "', NULL)";
    // use exec() because no results are returned


    try {
        $conn->exec($sql);
    } catch (PDOException $e) {
        $msg = $e->getMessage();
        $expected_error_message = "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '" . $newemail . "' for key 'email'";
        if ($msg == $expected_error_message) {
            echo '<h1>email already in use please <a href="index.php?page=login.php"> log in </a></h1>';
        }
    }
    $newURL = "index.php?page=login.php";
    header('Location: ' . $newURL);
} else {
    $newURL = "index.php?page=createAccount.php";
    header('Location: ' . $newURL);
}
