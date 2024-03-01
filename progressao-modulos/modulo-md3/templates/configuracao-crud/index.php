<?php

    if (!isset($_SESSION["user"])){
        header("location: pages-login/login.php?msg=forbidden");
    }

?>