<?php
/* 
 * Index Controller
 */

//Create of acces a Session
session_start();

//Get the database connection file
require_once 'library/connections.php';
//Get the acme model for use as needed
require_once 'model/acme-model.php';
//Get product model
require_once 'model/product-model.php';
//Get the functions library
require_once 'library/functions.php';

$categories = getCategories();
//var_dump($categories);
//   exit;
//Build a navigation bar using the $categories array
$navList = createNav($categories);
//echo $navList;
//exit;

//Get Products in Features
$featInfo = getFeaturedInv();
$featDisplay = createFeatDisplay($featInfo);

$mainFeat = getMainFeaturedInv();

$featMainDisplay = createFeatMainDisplay($mainFeat);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
   $action = filter_input(INPUT_GET, 'action');
//   if ($action == NULL){
//      $action = 'home';
//   }
}
if (isset($_COOKIE['firstname'])){
   $cookieFirstName = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

switch ($action){
   case 'something':
      
      break;

   default:
     
     
      include 'view/home.php';
// 
//   case 'home':
//      include 'view/home.php';
//      break;
}






