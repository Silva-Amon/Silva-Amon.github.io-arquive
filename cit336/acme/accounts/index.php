<?php

/*
 * Accounts Controller
 */
//Create of acces a Session
session_start();
//Get the database connection file
require_once '../library/connections.php';
//Get the acme model for use as needed
require_once '../model/acme-model.php';
//Get the accounts model
require_once '../model/accounts-model.php';
//Get the functions library
require_once '../library/functions.php';

$categories = getCategories();
//var_dump($categories);
//   exit;
//Build a navigation bar using the $categories array
$navList = createNav($categories);
//echo $navList;
//exit;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}
switch ($action) {
  case 'login':
    include '../view/login.php';
    break;
  case 'registration':
    include '../view/registration.php';
    break;
  case 'register':
    //Filter and store the data
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
    $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

    $clientEmail = checkEmail($clientEmail);
    $_SESSION['clientEmail'] = $clientEmail;
    $checkPassword = checkPassword($clientPassword);

    //checking for an existing email address
    $existingEmail = checkExistingEmail($clientEmail);
    if ($existingEmail) {
      $message = '<p class="warning">Email already registered,instead you may want login.</p>';
      include '../view/login.php';
      exit;
    }

    //Check for missing data
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
      $message = '<p class="error">Please provide information for all empty fields.';
      include '../view/registration.php';
      exit;
    }
    //Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    //Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);


    if ($regOutcome === 1) {
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
//         $message = "<p class='success'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
      $_SESSION['message'] = "<p class='success'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
//         include '../view/login.php';
      header('Location: /acme/accounts/?action=login');
      exit;
    } else {
      $message = "<p class='error'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/registration.php';
      exit;
    }
    break;
  case 'Login':

    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);
    //Check for missing data
    if (empty($clientEmail) || empty($checkPassword)) {
      $message = '<p class="error">Please provide information for all empty fields.';
      include '../view/login.php';
      exit;
    }
    // A valid password exists, proceed with the login process
    // Query the client data based on the email address
    $clientData = getClient($clientEmail);
    //Compare the password just submitted against
    //the hashed password for the matching client
    $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
    // If the hashes don't match create an error
// and return to the login view
    if (!$hashCheck) {
      $message = '<p class="error">Please check your password and try again. </p>';
      include '../view/login.php';
      exit;
    }
    // A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;
    //remove the password from the array
    // the array_pop function removes the last
    //element from an array
    array_pop($clientData);
    //Store the array into the session
    $_SESSION['clientData'] = $clientData;

    if (isset($_COOKIE['firstname'])) {
      //delete the cookie
      setcookie('firstname', null, - 1, '/');
      //setting it again
      setcookie('firstname', $clientData['clientFirstname'], strtotime('+1year'), '/');
      $cookieFirstName = $clientData['clientFirstname'];
    } else {
      setcookie('firstname', $clientData['clientFirstname'], strtotime('+1year'), '/');
      $cookieFirstName = $clientData['clientFirstname'];
    }
    unset($_SESSION['message']);
    //Send them to the admin view
    include '../view/admin.php';
    exit;
    break;
  case 'admin':
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE){
      include '../view/admin.php';
    }else{
      include '../view/login.php';
    }
  break;
  case 'updateClient':
    include('../view/client-update.php');
    exit;
    break;

  case 'modifyClient':
    //Filter and store the data
    $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
    $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);

    $clientEmail = checkEmail($clientEmail);

    //checking for an existing email address
    $existingEmail = checkExistingEmailUpdate($clientId, $clientEmail);
    if ($existingEmail) {
      $message = '<p class="warning">Email already registered,try other email.</p>';
      include '../view/client-update.php';
      exit;
    }
    //Check for missing data
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
      $message = '<p class="error">Please provide information for all empty fields.';
      include '../view/client-update.php';
      exit;
    }

    //Send the data to the model
    $updateOutcome = updateClient($clientId, $clientFirstname, $clientLastname, $clientEmail);

    if ($updateOutcome) {
      $message = "<p class='success'>Your information was updated, $clientFirstname!</p>";
      $_SESSION['message'] = $message;

      $clientData = getClient($clientEmail);
      //remove the password from the array
      // the array_pop function removes the last
      //element from an array
      array_pop($clientData);
      //Store the array into the session
      $_SESSION['clientData'] = $clientData;

      include '../view/admin.php';
      exit;
    } else {
      $message = "<p class='error'>Sorry $clientFirstname, but the update failed. Please try again.</p>";
      $_SESSION['message'] = $message;
      include '../view/admin.php';
      exit;
    }
    break;

  case 'modifyPassword':
    $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

    $checkPassword = checkPassword($clientPassword);
    //Check for missing data
    if (empty($checkPassword)) {
      $messagePassword = '<p class="error">Please use the required pattern for the password.';
      include '../view/client-update.php';
      exit;
    }
    //Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    $updateOutcome = updateClientPassword($clientId, $hashedPassword);

    if ($updateOutcome) {
      $message = "<p class='success'>Your password was updated with success, " . $_SESSION['clientData']['clientFirstname'] . '.</p>';
      $_SESSION['message'] = $message;
//         include '../view/login.php';
      include '../view/admin.php';
      exit;
    } else {
      $message = "<p class='error'>Sorry $clientFirstname, but the password failed to change. Please try again.</p>";
      $_SESSION['message'] = $message;
      include '../view/admin.php';
      exit;
    }
    break;

  case 'Logout':
    session_destroy();
    setcookie('firstname', null, - 1, '/');
    header('Location: /acme/');
    exit;
    break;
  default:
    header('Location: /acme/');
    break;
}






