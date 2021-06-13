<?php
require 'head.php';
require 'menubar.php';
?>
<div class="container justify-content-md-center inner-content">
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home.php';
    $pages = array('home.php', 'info.php', 'myaccount.php', 'myaccounthistory.php', 'login.php', 'createAccount.php', 'hotelindex.php', 'myhotelinfo.php', 'roomsindex.php', 'myroomsinfo.php');
    if (!empty($page)) {
        if (in_array($page, $pages)) {
            include($page);
        } else {
            echo 'requested' . $page . 'not found <br>redirecting to home';
        }
    }
    ?>
</div>
</body>

</html>