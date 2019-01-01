<?php

/* Product image uploads
 */

//Add image information to the database table
function storeImages($imgPath, $invId, $imgName) {
  $db = acmeConnect();
  $sql = 'INSERT INTO images (InvId, ImgPath, ImgName) VALUES (:invId, :imgPath, :imgName)';
  $stmt = $db->prepare($sql);
  //Store the full size imae information
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':imgPath', $imgPath, PDO::PARAM_STR);
  $stmt->bindValue(':imgName', $imgName, PDO::PARAM_STR);
  $stmt->execute();

  //Make and store the thumbnail image information
  //Change name in path
  $imgPath = makeThumbnailName($imgPath);
  // Change name in file name
  $imgName = makeThumbnailName($imgName);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':imgPath', $imgPath, PDO::PARAM_STR);
  $stmt->bindValue(':imgName', $imgName, PDO::PARAM_STR);
  $stmt->execute();

  $rowChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowChanged;
}

//Get Image Informatio nfrom images table
function getImages() {
  $db = acmeConnect();
  $sql = 'SELECT imgId, imgPath, imgName, imgDate, inventory.invId, invName FROM images JOIN inventory ON images.invId = inventory.invId';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $imageArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $imageArray;
}

//Delete image informatio nfrom the images table
function deleteImage($id) {
  $db = acmeConnect();
  $sql = 'DELETE FROM images WHERE imgId = :imgId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':imgId', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->rowCount();
  $stmt->closeCursor();
  return $result;
}

//Check for an existing image
function checkExistingImage($imgName) {
  $db = acmeConnect();
  $sql = "SELECT imgName FROM images WHERE imgName = :name";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':name', $imgName, PDO::PARAM_STR);
  $stmt->execute();
  $imageMatch = $stmt->fetch();
  $stmt->closeCursor();
  return $imageMatch;
}

//Get Thumbnail information based on the productId
function getThumbnailInfo($productId){
  $db = acmeConnect();
  $sql = "SELECT * FROM images WHERE invId = :invId AND imgName LIKE '%-tn.___%'";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(":invId", $productId, PDO::PARAM_INT);
  $stmt->execute();
  $thumbnailInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $thumbnailInfo;
}
