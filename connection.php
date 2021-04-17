<?php
const HOSTNAME = 'localhost';
const USERNAME = 'dictator';
const PASSWORD = 'zero';
const DB = 'authentication_system';

$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB);

session_start();