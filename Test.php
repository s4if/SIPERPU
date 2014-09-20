<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

$date1 = new DateTime(date("Y-m-d"));
echo $date1->format('Y-m-d').'<br>';
$date1->modify('+6day');
echo $date1->format('Y-m-d');
