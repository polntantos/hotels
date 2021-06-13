<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=home.php">Ηome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=hotelindex.php">Hotels</a>
                </li>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="index.php?page=myhotelinfo.php">My Hotel</a>';
                    echo '</li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=roomsindex.php">Rooms</a>
                </li>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="index.php?page=myroomsinfo.php">My Rooms</a>';
                    echo '</li>';
                }
                ?>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<li class="nav-item dropdown">';
                    echo '<a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                    echo $_SESSION["fname"] . ' ';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>';
                    echo '</a>';
                    require 'myacountdrop.php';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link dropdown-toggle" href="index.php?page=login.php">login</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>