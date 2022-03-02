<?php
$_SESSION['login'] = false;
session_unset();
session_destroy();
echo "<script>document.location.replace('http://localhost:8888/GEIPAN/index.php?page=home');</script>";
