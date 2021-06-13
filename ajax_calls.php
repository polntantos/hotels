<?php
session_start();

$call_name = htmlspecialchars($_GET["call_name"]);

$param = htmlspecialchars($_GET["param"]);

switch ($call_name) {
    case 'test_ajax_call':
        test_ajax_call($param);
        break;
    case 'hotel_save':
        hotel_save();
        break;
}

function test_ajax_call()
{
    //do something and return result

    echo 'answer';
}

function hotel_save()
{
    require 'dbconf.php';

    $hotelid = $_POST['hotelid'];
    $hotelname = $_POST['hotel_name'];
    $stars = $_POST['stars'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $city = $_POST['city'];

    $longitude = (isset($_POST['longitude'])) ? $_POST['longitude'] : '0';

    $latitude = (isset($_POST['latitude'])) ? $_POST['latitude'] : '0';

    $phonenumber = $_POST['phonenumber'];

    if (isset($hotelid) && !empty($hotelid)) {
        $sql = "UPDATE `mydb`.`hotels` SET `hotelname` = '$hotelname', `hotelstar` = '$stars', `location` = '$location', `description` = '$description', `longitude` = '$longitude', `latitude` = '$latitude', `nomoi_nomoiid` = '$city', `phonenumber` = '$phonenumber' WHERE `hotelid` = '$hotelid';";
    } else {
        $sql = "INSERT INTO `mydb`.`hotels` (`hotelname`, `hotelstar`, `location`, `description`, `longitude`, `latitude`, `nomoi_nomoiid`,`phonenumber`) VALUES ( '$hotelname', '$stars', '$description', '$location', '$longitude', '$latitude', '$city', '$phonenumber');";
    }


    try {
        $stmt = $conn->exec($sql);

        $hotel_id = $conn->lastInsertId();
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
    $userid = $_SESSION["userid"];

    $usersql = "UPDATE `mydb`.`user` SET `hotels_hotelid` = '$hotel_id' WHERE (`userid` = '$userid');";
    $stmt = $conn->prepare($usersql);
    // die();
    try {
        $stmt->execute();
        $_SESSION['hotel_id'] = $hotel_id;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $newURL = "index.php?page=hotelindex.php";
    header('Location: ' . $newURL);
}
