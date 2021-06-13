<?php require 'dbconf.php';

if (isset($_GET["msg"])) {
    if ($_GET["msg"] == "failedat") {
        echo '<H1>if you have trouble loging in feel free to communicate with us</H1>';
    }
    if ($_GET["msg"] == "logfirst") {
        echo '<h1>you must be logged in before performing this action</h1>';
        $_SESSION["redirback"] = true;
    }
}
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $newURL = "index.php?page=home.php";
    header('Location: ' . $newURL);
}
?>
<div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <form action="user_login.php" method="POST">
            <div class="mb-3">
                <label for="inputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="inputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="index.php?page=createAccount.php">or Create an Account</a>
        </form>
    </div>
</div>