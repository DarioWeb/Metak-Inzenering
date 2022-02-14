<?php
session_start();
include "../database/db.php";
include "authCheck.php";

$check = new authCheck();
$check->checkUser();