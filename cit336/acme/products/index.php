<?php

/* Product Index.php
 */
//Create of acces a Session
session_start();
//Get the database connection file
require_once '../library/connections.php';
//Get the acme model for use as needed
require_once '../model/acme-model.php';
//Get product model
require_once '../model/product-model.php';
//Get update model
require_once '../model/uploads-model.php';
//Get library Functions
require_once '../library/functions.php';


$categories = getCategories();
//var_dump($categories);
//   exit;
//Build a navigation bar using the $categories array
$navList = createNav($categories);
//echo $navList;
//exit;
//$catList = '<select name="categoryId" id="categoryId" required>';
//$catList .= '<option>Choose a Category</option>';
//foreach ($categories as $category) {
//   if (isset(filter_input(INPUT_POST, 'categoryId')) && filter_input(INPUT_POST, 'categoryId') === $category) {
//      $catList .= '<option value ="' . $category['categoryId'] . '" selected>' . $category['categoryName'] . '</option>';
//   } else {
//      $catList .= '<option value ="' . $category['categoryId'] . '">' . $category['categoryName'] . '</option>';
//   }
//}
//$catList .= '</select>';
//echo var_dump($catList);
//exit;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
//   if ($action == NULL){
//      $action = 'home';
//   }
}
switch ($action) {
  case 'newCat':
    include '../view/new-cat.php';
    break;
  case 'newProd':
    include '../view/new-prod.php';
    break;
  case 'registerCat':
    //Filter and store the data
    $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);

    //Check for missing data
    if (empty($categoryName)) {
      $message = '<p class="error">Please provide information for all empty fields.</p>';
      include '../view/new-cat.php';
      exit;
    }
    $regOutcome = regCategory($categoryName);

//      if ($regOutcome === 1) {
//         $message = "<p class='success'> $categoryName Added with success!</p>";
//         include '../view/new-cat.php';
//         exit;
//      } else {
//         $message = "<p class='error'>Error to add $categoryName.</p>";
//         include '../view/new-cat.php';
//         exit;
//      }
    if (!$regOutcome === 1) {
      $message = "<p class='error'>Error to add $categoryName.</p>";
      include '../view/new-cat.php';
      exit;
    }
    header('Location: /acme/products/index.php');
    break;

  case 'regProduct':
    //Filter and store the data
    $categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
    $invName = filter_input(INPUT_GET, 'invName', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_GET, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_GET, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_GET, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_GET, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_GET, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invSize = filter_input(INPUT_GET, 'invSize', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invWeight = filter_input(INPUT_GET, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invLocation = filter_input(INPUT_GET, 'invLocation', FILTER_SANITIZE_STRING);
    $invVendor = filter_input(INPUT_GET, 'invVendor', FILTER_SANITIZE_STRING);
    $invStyle = filter_input(INPUT_GET, 'invStyle', FILTER_SANITIZE_STRING);

    $categoryId = checkInt($categoryId);
    $invPrice = checkFloat($invPrice);
    $invStock = checkInt($invStock);
    $invSize = checkFloat($invSize);
    $invWeight = checkFloat($invWeight);

    //Check for missing data
    if (empty($categoryId) || empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($invVendor) || empty($invStyle)) {
      $message = '<p class="error">Please provide information for all empty fields.</p>';
      include '../view/new-prod.php';
      exit;
    }
    $regOutcome = regProduct($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle);

    if ($regOutcome === 1) {
      $message = "<p class='success'> Product added with success!</p>";
      include '../view/new-prod.php';
      exit;
    } else {
      $message = "<p class='error'>Error to add product.</p>";
      include '../view/new-prod.php';
      exit;
    }

    break;

  case 'mod':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $prodInf = getProductInfo($invId);
    if (count($prodInf) < 1) {
      $message = 'Sorry, no product information could be found.';
    }
    include '../view/prod-update.php';
    exit;
    break;

  case 'updateProd':
    //Filter and store the data
    $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
    $categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
    $invName = filter_input(INPUT_GET, 'invName', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_GET, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_GET, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_GET, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_GET, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_GET, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invSize = filter_input(INPUT_GET, 'invSize', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invWeight = filter_input(INPUT_GET, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invLocation = filter_input(INPUT_GET, 'invLocation', FILTER_SANITIZE_STRING);
    $invVendor = filter_input(INPUT_GET, 'invVendor', FILTER_SANITIZE_STRING);
    $invStyle = filter_input(INPUT_GET, 'invStyle', FILTER_SANITIZE_STRING);

    $categoryId = checkInt($categoryId);
    $invPrice = checkFloat($invPrice);
    $invStock = checkInt($invStock);
    $invSize = checkFloat($invSize);
    $invWeight = checkFloat($invWeight);

    //Check for missing data
    if (empty($categoryId) || empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($invVendor) || empty($invStyle)) {
      $message = '<p class="error">Some error occured to update, check the for empty data.</p>';
      include '../view/prod-update.php';
      exit;
    }
    $updateResult = updateProduct($invId, $categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle);

    if ($updateResult) {
      $message = "<p class='success'> Product updated with success!</p>";
      $_SESSION['message'] = $message;
      header('location: /acme/products/');
      exit;
    } else {
      $message = "<p class='error'>Error to update product.</p>";
      include '../view/prod-update.php';
      exit;
    }
    break;
  case 'del':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $prodInf = getProductInfo($invId);
    if (count($prodInf) < 1) {
      $message = 'Sorry, no product information could be found.';
    }
    include '../view/prod-delete.php';
    exit;
    break;
  case 'deleteProd':
    //Filter and store the data
    $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
    $invName = filter_input(INPUT_GET, 'invName', FILTER_SANITIZE_STRING);

    $deleteResult = deleteProduct($invId);

    if ($deleteResult) {
      $message = "<p class='success'> $invName deleted with success!</p>";
      $_SESSION['message'] = $message;
      header('location: /acme/products/');
      exit;
    } else {
      $message = "<p class='error'> Some error occured to delete $invName</p>";
      $_SESSION['message'] = $message;
      header('location: /acme/products/');
      exit;
    }
    break;

  case 'mainFea':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $prodInf = getProductInfo($invId);
    $lastProdInfo = getLastProductInfo($invId);
    $removeLastMainFeat = clearMainProductFeature();
    $updateProdMainFeat = setMainProductFeature($invId);

    if ($updateProdMainFeat) {
      $_SESSION['prodFeatMessage'] = "<p class='success'> $prodInf[invName] featured with success!</p>";
    } else {
      $_SESSION['prodFeatMessage'] = "<p class='error'> Error to feature the $prodInf[invName] product!</p>";
    }
    if ($removeLastMainFeat){
      $_SESSION['prodFeatMessage'] .= "<p class='warning'> $lastProdInfo[invName] removed from feature with success!</p>";
      header('location: /acme/products/');
      exit;
    }else{
      $_SESSION['prodFeatMessage'] .= "<p class='error'> Error to remove $prodInf[invName] from feature product!</p>";
      header('location: /acme/products/');
      exit;
    }
  break;

  case 'fea':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $prodInf = getProductInfo($invId);
    if (count($prodInf) < 1) {
      $message = 'Sorry, no product information could be found.';
    }

    if ($prodInf['invRecipeList'] == NULL) {
      include '../view/fea-set.php';
      exit;
    } else {
      include '../view/fea-clean.php';
      exit;
    }
    break;
  case 'feaSet':

    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $updateProdFeat = setFeatureInv($invId);

    if ($updateProdFeat) {
      $_SESSION['prodFeatMessage'] = "<p class='success'> Product in recipe list with success!</p>";
      header('location: /acme/products/');
      exit;
    } else {
      $_SESSION['prodFeatMessage'] = "<p class='error'> Error to add product the product.</p>";
      header('location: /acme/products/');
      exit;
    }
    break;
  case 'feaRemove':

    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $updateProdFeat = clearFeaturedInv($invId);

    if ($updateProdFeat) {
      $_SESSION['prodFeatMessage'] = "<p class='success'> Product in recipe list removed with success!</p>";
      header('location: /acme/products/');
      exit;
    } else {
      $_SESSION['prodFeatMessage'] = "<p class='error'> Error to remove from recipe list the product.</p>";
      header('location: /acme/products/');
      exit;
    }
    break;

  case 'category':
    $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);
    $products = getProductByCategory($categoryName);
    if (!count($products)) {
      $message = "<p class='warning'>Sorry, no $categoryName products could be found.</p>";
    } else {
      $prodDisplay = buildProductsDisplay($products);
    }
//    echo $prodDisplay;
//    exit;
    include '../view/category.php';
    break;
  case 'details':
    $invId = filter_input(INPUT_GET, 'productId', FILTER_SANITIZE_NUMBER_INT);
    $invCatId = filter_input(INPUT_GET, 'catId', FILTER_SANITIZE_NUMBER_INT);

    $productDetailed = getProductDetailedByInvId($invId, $invCatId);

    $thumbnailInfo = getThumbnailInfo($invId);
    $thumbnailList = buildThumbnailList($thumbnailInfo);

    if (!count($productDetailed)) {
      $message = "<p class='warning'>Sorry, no details found for this product.</p>";
    } else {
      $prodDisplay = buildDetailedProductDisplay($productDetailed);
    }

    include '../view/product-detail.php';
    break;
  default:
    $products = getProductBasics();
    if (count($products) > 0) {
      $prodList = '<div id="tableContainer">';
      $prodList .= '<table>';
      $prodList .= '<thead>';
      $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $prodList .= '</thead>';
      $prodList .= '<tbody>';
      foreach ($products as $product) {
        $prodList .= "<tr><td>$product[invName]</td>";
        $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
        $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td>";

        $prodAllInf = getProductInfo($product['invId']);

        if ($prodAllInf['invRecipeList'] == NULL) {
          $prodList .= "<td><a href='/acme/products?action=fea&id=$product[invId]' title='Click to feature'>Add to recipe list</a></td>";
        } else {
          $prodList .= "<td><a href='/acme/products?action=fea&id=$product[invId]' title='Click to feature' class='txtRemove'>Remove from the recipe list</a></td>";
        }
        $prodList .= "<td><a href='/acme/products?action=mainFea&id=$product[invId]'>Feature Product</a></td></tr>";
      }
      $prodList .= '</tbody></table></div>';
    } else {
      $message = '<p class="warning">Sorry, no products were returned.</p>';
    }
    include '../view/prod-mgmt.php';
    break;
}






