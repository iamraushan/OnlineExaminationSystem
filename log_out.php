<?php
session_start();
session_destroy();

header("location:homepage_front.php?msg=logout out");
?>