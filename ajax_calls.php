<?php

$call_name = htmlspecialchars($_GET["call_name"]);

$param = htmlspecialchars($_GET["param"]);

switch ($call_name) {
    case 'test_ajax_call':
        test_ajax_call($param);
        break;
}

function test_ajax_call()
{
    //do something and return result

    return 'answer';
}

//It's ajax we don't redirect only answer preferably in JSON format
/* 
    // use exec() because no results are returned

$sql = "INSERT INTO `mydb`.`user` (`fname`, `lname`, `email`, `password`, `create_time`) VALUES ('" . $newfname . "', '" . $newlname . "', '" . $newemail . "', '" . $newpasswd . "', NULL)";
    try {
        $conn->exec($sql);
    } catch (PDOException $e) {
        $msg = $e->getMessage();
        $expected_error_message = "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '" . $newemail . "' for key 'email'";
        if ($msg == $expected_error_message) {
            echo '<h1>email already in use please <a href="index.php?page=login.php"> log in </a></h1>';
        }
    } */