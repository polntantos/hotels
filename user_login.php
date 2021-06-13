<?php
session_start();
require 'dbconf.php';
$useremail = $_POST['email'];
$userpasswd = htmlspecialchars_decode(trim($_POST['password']));


$sqlquery = "select userid,fname,lname,email,password,hotels_hotelid from user where email='" . $useremail . "'";
$stmt = $conn->prepare($sqlquery);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = ($stmt->fetchAll());

if (isset($result[0]) && password_verify($userpasswd, $result[0]['password'])) {
    $userdata = $result[0];
    $_SESSION["failedat"] = 0;
    $_SESSION["loggedin"] = true;
    $_SESSION["userid"] = $userdata['userid'];
    $_SESSION["fname"] = $userdata['fname'];
    $_SESSION["lname"] = $userdata['lname'];
    $_SESSION["email"] = $userdata['email'];
    $_SESSION["hotel_id"] = $userdata['hotels_hotelid'];
    $newURL = "index.php?page=home.php";
    header('Location: ' . $newURL);
    die();
} else {
    if (isset($_SESSION["failedat"])) {
        $_SESSION["failedat"]++;
        $newURL = "index.php?page=login.php";

        header('Location: ' . $newURL);
    } else {
        $_SESSION["failedat"] = 1;
        $newURL = "index.php?page=login.php";
        header('Location: ' . $newURL);
    }
    if ($_SESSION["failedat"] > 3) {
        $msg = "failedat";
        $newURL = "index.php?page=login.php";
        header('Location: ' . $newURL . '&msg=' . $msg);
    }
}
