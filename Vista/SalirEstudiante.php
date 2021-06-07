<?php
session_start();

session_destroy();

header("location:../LoginEstudiante/index.html");
exit();


?>