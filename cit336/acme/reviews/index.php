<?php

/* Reviews Controller
 */

//Create of access a Session
session_start();
//Get the database connection file
require_once '../library/connections.php';
//Get the acme model for use as needed
require_once '../model/acme-model.php';
//Get the accounts model
require_once '../model/accounts-model.php';
//Get the uploads model
require_once '../model/uploads-model.php';
//Get the functions library
require_once '../library/functions.php';

//getting action
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}
switch ($action) {
  default:
    header('Location: /acme/');
  break;
}
