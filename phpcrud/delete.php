<?php
    require 'users.php';
    $id = $_GET['id'];
    deleteUser($id);
    header("Location: http://launchpad.webfries.net/mealz/phplrn/index.php") ;
?>