<?php


session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

session_destroy();
header(header: 'Location: ../../views/backend/security/login.php');
