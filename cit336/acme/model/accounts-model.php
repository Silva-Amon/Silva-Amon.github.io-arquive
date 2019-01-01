<?php

/*
 * Accounts Model
 */

//This function will handle site registrations
function regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword) {
  //Create a connection object using the acme connection function.
  $db = acmeConnect();
  //The SQL statement
  $sql = 'INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword) VALUES (:clientFirstName, :clientLastname, :clientEmail, :clientPassword)';
  // Create the prepared statement using the acme connection.
  $stmt = $db->prepare($sql);
  //The next four lines replace the placeholders in the SQL
  //statement with the actual values in the variables
  // an tells the database the type of data it is.
  $stmt->bindValue(':clientFirstName', $clientFirstname, PDO::PARAM_STR);
  $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
  $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
  $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
  //Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert.
  $rowChanged = $stmt->rowCount();
  //Close the database interaction
  $stmt->closeCursor();
  //Return the indication of success (row changed)
  return $rowChanged;
}

//check for an existing email address.
function checkExistingEmail($clientEmail) {
  $db = acmeConnect();
  $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
  $stmt->closeCursor();
  if (empty($matchEmail)) {
    return 0;
//      echo 'Nothing found';
//      exit;
  } else {
    return 1;
//      echo 'Match found';
//      exit;
  }
}

//check for an existing email address for update queries.
function checkExistingEmailUpdate($clientId, $clientEmail) {

  $db = acmeConnect();
  $sql = 'SELECT clientId, clientEmail FROM clients WHERE clientEmail = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
  $stmt->closeCursor();
  if (empty($matchEmail) || intVal($matchEmail[0]) == $clientId) {
    return 0;
//      echo 'Nothing found';
//      exit;
  } else {
    return 1;
//      echo 'Match found';
//      exit;
  }
}

//}

function getClient($clientEmail) {
  $db = acmeConnect();
  $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;
}

//update client information
function updateClient($clientId, $clientFirstname, $clientLastname, $clientEmail) {
  $db = acmeConnect();

  $sql = 'UPDATE clients SET clientFirstname = :clientFirstname, clientLastname = :clientLastname, clientEmail = :clientEmail WHERE clientId = :clientId';

  $stmt = $db->prepare($sql);

  $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
  $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
  $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

  $stmt->execute();
  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}

//update client password
function updateClientPassword($clientId, $hashedPassword) {
  $db = acmeConnect();

  $sql = 'UPDATE clients SET clientPassword = :clientPassword WHERE clientId = :clientId';

  $stmt = $db->prepare($sql);

  $stmt->bindValue(':clientPassword', $hashedPassword, PDO::PARAM_STR);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

  $stmt->execute();
  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}
