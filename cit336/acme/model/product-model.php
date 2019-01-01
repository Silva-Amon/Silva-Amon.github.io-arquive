<?php

/*
 * product model
 */

//This function will handle site registrations
function regCategory($categoryName) {
  $db = acmeConnect();
  $sql = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
  $stmt->execute();
  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}

function regProduct($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle) {

  $db = acmeConnect();

  $sql = 'INSERT INTO inventory (categoryId, invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, invVendor, invStyle) VALUES (:categoryId, :invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :invVendor, :invStyle )';

  $stmt = $db->prepare($sql);
  $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
  $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
  $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
  $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
  $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
  $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
  $stmt->bindValue(':invStock', $invStock, PDO::PARAM_STR);
  $stmt->bindValue(':invSize', $invSize, PDO::PARAM_STR);
  $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_STR);
  $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
  $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
  $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);

  $stmt->execute();
  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}

//Get basic product information from inventory - updat and delet
function getProductBasics() {
  $db = acmeConnect();
  $sql = 'SELECT invName, invId FROM inventory ORDER BY invName ASC';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $products;
}

//Select a single product beased on its id
function getProductInfo($invId) {
  $db = acmeConnect();
  $sql = 'SELECT * FROM inventory WHERE invId = :invId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->execute();
  $prodInfo = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $prodInfo;
}
function getLastProductInfo(){
    $db = acmeConnect();
  $sql = 'SELECT * FROM inventory WHERE invFeatured = :bool';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':bool', TRUE, PDO::PARAM_BOOL);
  $stmt->execute();
  $prodInfo = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $prodInfo;
}

//update the product
function updateProduct($invId, $categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle) {

  $db = acmeConnect();

  $sql = 'UPDATE  inventory SET invName = :invName, invDescription = :invDescription, invImage = :invImage, invThumbnail = :invThumbnail, invPrice = :invPrice, invStock = :invStock, invSize = :invSize, invWeight = :invWeight, invLocation = :invLocation, categoryId = :categoryId, invVendor = :invVendor, invStyle = :invStyle WHERE invId = :invId';

  $stmt = $db->prepare($sql);
  $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
  $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
  $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
  $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
  $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
  $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
  $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
  $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
  $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
  $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
  $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
  $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);

  $stmt->execute();
  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}

//This function will carry out a product delete.
function deleteProduct($invId) {

  $db = acmeConnect();

  $sql = 'DELETE FROM inventory WHERE invId = :invId';

  $stmt = $db->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);

  $stmt->execute();
  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}

//This function will get a list of products based on the category.
function getProductByCategory($categoryName) {
  $db = acmeConnect();
  $sql = 'SELECT * FROM inventory WHERE categoryId IN (SELECT categoryId FROM categories WHERE categoryName = :categoryName)';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
  $stmt->execute();
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $products;
}

function getProductDetailedByInvId($invId, $invCatId) {
  $db = acmeConnect();
  $sql = 'SELECT *, (SELECT categoryName FROM categories WHERE categoryId = :categoryId) AS category FROM inventory WHERE invId = :invId';
//  $sql = 'SELECT *, category = (SELECT Cat.categoryName FROM categories AS Cat WHERE cat.categoryId = inv.invId) FROM inventory AS inv WHERE inv.invId = :invId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':categoryId', $invCatId, PDO::PARAM_INT);
  $stmt->execute();
  $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $product;
}

//get featured inventory item
function getFeaturedInv() {
  $db = acmeConnect();

  $sql = 'SELECT * FROM inventory WHERE invRecipeList = 1';

  $stmt = $db->prepare($sql);

  $stmt->execute();
  $featInf = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ;
  $stmt->closeCursor();
  return $featInf;
}

//get main featured inventory item
function getMainFeaturedInv() {
  $db = acmeConnect();

  $sql = 'SELECT * FROM inventory WHERE invFeatured = 1';

  $stmt = $db->prepare($sql);

  $stmt->execute();
  $featInf = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ;
  $stmt->closeCursor();
  return $featInf;
}

//clear featured inventory item, changing it to NULL
function clearFeaturedInv($invId) {
  $db = acmeConnect();

  $sql = 'UPDATE inventory SET invRecipeList = :bool WHERE invId = :invId';

  $stmt = $db->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':bool', null, PDO::PARAM_INT);

  $stmt->execute();
  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}

//Put feature inventory item as true
function setFeatureInv($invId) {
  $db = acmeConnect();

  $sql = 'UPDATE inventory SET invRecipeList = :bool WHERE invId = :invId';

  $stmt = $db->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':bool', TRUE, PDO::PARAM_BOOL);
  $stmt->execute();
  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}

//Remove all the feature product
function clearMainProductFeature() {
  $db = acmeConnect();

  $sql = 'UPDATE inventory SET invFeatured = :bool WHERE invFeatured = 1';

  $stmt = $db->prepare($sql);
  $stmt->bindValue(':bool', null, PDO::PARAM_INT);

  $stmt->execute();
  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}

//Set product as the feature product
function setMainProductFeature($invId) {
  $db = acmeConnect();

  $sql = 'UPDATE inventory SET invFeatured = :bool WHERE invId = :invId';

  $stmt = $db->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':bool', TRUE, PDO::PARAM_BOOL);
  $stmt->execute();
  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}
