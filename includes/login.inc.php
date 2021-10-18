<?php

if(isset($_POST["submit"])) {
    //Grabing the data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    //Instantiate SignupContr class
    require_once "../classes/dbh.classes.php";
    require_once "../classes/login.classes.php";
    require_once "../classes/login-contr.classes.php";
    $login = new LoginContr($uid, $pwd);

    //Running error handlers and user signup
    $login->loginUser();

    //Going to back to front page
    header("location: ../index.php?error=none");
}