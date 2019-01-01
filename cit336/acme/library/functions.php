<?php

function checkEmail($clientEmail) {
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function checkInt($int) {
  $options = array(
      'options' => array(
          'min_range' => 0,
      )
  );
  $valInt = filter_var($int, FILTER_VALIDATE_INT, $options);
  return $valInt;
}

function checkFloat($float) {
  $options = array(
      'options' => array(
          'min_range' => 0,
      )
  );
  $valFloat = filter_var($float, FILTER_VALIDATE_FLOAT, $options);
  return $valFloat;
}

function createNav($categories) {
  $navList = '<ul>';
  $navList .= "<li><a href='/acme/' title='View the Acme home page'>Home</a></li>";
  foreach ($categories as $category) {
    $navList .= "<li><a href='/acme/products?action=category&categoryName=" . urlencode($category['categoryName']) . "' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
  }
  $navList .= '</ul>';
  return $navList;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword) {
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
  return preg_match($pattern, $clientPassword);
}

//This function will build a display of products within an unordered list.
function buildProductsDisplay($products) {
  $pd = '<ul id="prod-display">';
  foreach ($products as $product) {
    $pd .= '<li>';
    $pd .= "<a href='/acme/products/?action=details&productId=$product[invId]&catId=$product[categoryId]'><img src='$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'>";
    $pd .= '<hr>';
    $pd .= "<h2>$product[invName]</h2>";
    $pd .= "<span>$product[invPrice]</span>";
    $pd .= '</li></a>';
  }
  $pd .= '</ul>';
  return $pd;
}

//This function will build a display of detailed products whitin a div.
function buildDetailedProductDisplay($productDetailed) {
  $pd = '<div id="detailed-prod-display">';
  foreach ($productDetailed as $product) {
    $pd .= "\n<img src='$product[invImage]' alt='Image of $product[invName] on Acme.com'>\n";
    $pd .= '<div id="info">';
    $pd .= "\n<h3>Product Name: $product[invName]</h3>";
    $pd .= "\n<span class='price'><strong>Price: </strong>$product[invPrice]</span>";
    $pd .= "\n<p><strong>Description: </strong>$product[invDescription]</p>";
    $pd .= "\n<p><strong>Stock: </strong>$product[invStock]</p>";
    $pd .= "\n<p><strong>Size: </strong>$product[invSize]</p>";
    $pd .= "\n<p><strong>Weight: </strong>$product[invWeight]</p>";
    $pd .= "\n<p><strong>Location: </strong>$product[invLocation]</p>";
    $pd .= "\n<p><strong>Vendor: </strong>$product[invVendor]</p>";
    $pd .= "\n<p><strong>Style: </strong>$product[invStyle]</p>";
    $pd .= "\n<p><strong>category: </strong>$product[category]</p>\n";
    $pd .= '</div>';
  }

  $pd .= "\n</div>\n";

  return $pd;
}

/* * ********************************
 *  Functions for working with images
 * ********************************* */

//Adds "-tn"designation to file name
function makeThumbnailName($image) {
  $i = strrpos($image, '.');
  $image_name = substr($image, 0, $i);
  $ext = substr($image, $i);
  $image = $image_name . '-tn' . $ext;
  return $image;
}

//Build images display for image management view
function buildImageDisplay($imageArray) {
  $id = '<ul id="image-display">';
  foreach ($imageArray as $image) {
    $id .= '<li>';
    $id .= "<img src='$image[imgPath]' title='$image[invName] image on Acme.com' alt='$image[invName] image on Acme.com'>";
    $id .= "<p><a href='/acme/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
    $id .= "</li>";
  }
  $id .= '</ul>';
  return $id;
}

//Build the products select list
function buildProductsSelect($products) {
  $prodList = '<select name="invId" id="invId">';
  $prodList .= "<option>Choose a Product</option>";
  foreach ($products as $product) {
    $prodList .= "<option value='$product[invId]'>$product[invName]</option>";
  }
  $prodList .= '</select>';
  return $prodList;
}

//Handles the file upload process and returns the path
//The file path is stored into the database.
function uploadFile($name) {
  //Gets the paths, full and local directory
  global $image_dir, $image_dir_path;
  if (isset($_FILES[$name])) {

    //Gets the actual file name
    $filename = $_FILES[$name]['name'];

    if (empty($filename)) {
      return;
    }
    //Get the file from the temp folder on the server
    $source = $_FILES[$name]['tmp_name'];

    //Sets the new path - images folder in this directory
    $target = $image_dir_path . '/' . $filename;
            
    //Moves the file to the target folder
    move_uploaded_file($source, $target);
    //Send file for further processing
    processImage($image_dir_path, $filename);
    //sets the path for the image for Database storage
    $filePath = $image_dir . '/' . $filename;

    //Returns the path where the file is stored.
    return $filePath;
  }
}

//Processes images by getting paths and
//Creating smaller versions of the image
function processImage($dir, $filename) {
  //Set up the variables
  $dir = $dir . '/';

  //Set up the image path
  $image_path = $dir . $filename;

  //Set up the thumbnail image path
  $image_path_tn = $dir . makeThumbnailName($filename);

  //Create a thumbnail image that's a maximum of 200 pixels square
  resizeImage($image_path, $image_path_tn, 200, 200);

  //Resize original to a maximum of 500 pixels square
  resizeImage($image_path, $image_path, 500, 500);
}

//Checks and Resizes image
function resizeImage($old_image_path, $new_image_path, $max_width, $max_height) {

  //Get image type
  $image_info = getimagesize($old_image_path);
  $image_type = $image_info[2];

  //Set up the function names
  switch ($image_type) {
    case IMAGETYPE_JPEG:
      $image_from_file = 'imagecreatefromjpeg';
      $image_to_file = 'imagejpeg';
    break;
    case IMAGETYPE_GIF:
      $image_from_file = 'imagecreatefromgif';
      $image_to_file = 'imagegif';
    break;
    case IMAGETYPE_PNG:
      $image_from_file = 'imagecreatefrompng';
      $image_to_file = 'imagepng';
    break;
    default:
    return;
  } //ends the resizeImage function
  
  //Get the ld image and its height and width
  $old_image = $image_from_file($old_image_path);
  $old_width = imagesx($old_image);
  $old_height = imagesy($old_image);
  
  //Calculate height and width ratios
  $width_ratio = $old_width / $max_width;
  $height_ratio = $old_height / $max_height;
  
  //If image is larger than specified ratio, create the new image
  if ($width_ratio > 1 || $height_ratio > 1){
    
    //calculate height and width for the new image
    $ratio = max($width_ratio, $height_ratio);
    $new_height = round($old_height / $ratio);
    $new_width = round($old_width / $ratio);
    
    //Create the new image
    $new_image = imagecreatetruecolor($new_width, $new_height);
    
    //set Transparency according to the image type
    if ($image_type == IMAGETYPE_GIF){
      $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
      imagecolortransparent($new_image, $alpha);
    }
    
    if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF){
      imagealphablending($new_image, false);
      imagesavealpha($new_image, true);
    }
    
    //Copy old image to new image - this resizes the image
    $new_x = 0;
    $new_y = 0;
    $old_x = 0;
    $old_y = 0;
    imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);
    
    //Write the new image to a new file
    $image_to_file($new_image, $new_image_path);
    //Free any memory associated with the new image
    imagedestroy($new_image);
  } else {
    //Write the old image to a new file
    $image_to_file($old_image, $new_image_path);
  }
  //Free any memory associate with the old image
  imagedestroy($old_image);
} //ends the if - else began on line 202

//This function will build a thumbnail list
function buildThumbnailList($thumbnailInfo){
  $unlist = '<ul id="thumbnail-unor-list">';
  foreach ($thumbnailInfo as $thumbnail){
    $unlist .= '<li>';
    $unlist .= "<img src='$thumbnail[ImgPath]' alt='Thumbnail of product' title='Thumbnail of product'>";
    $unlist .= '</li>';
  }
  $unlist .= '</ul>';
  return $unlist;

}

//create Product in Feature view
function createFeatDisplay($featInfo){
  $featureProd = '';

  foreach ($featInfo as $feat){
    $featureProd .= '<figure>';
    $featureProd .= "<img src='$feat[invImage]' alt='$feat[invName] feature image'>";
    $featureProd .= "<a href='/acme/products/?action=details&productId=$feat[invId]&catId=$feat[categoryId]'>$feat[invName]</a>";
    $featureProd .= '</figure>';
  }
  return $featureProd;  
}

//create Product Feature img and detail
function createFeatMainDisplay($featInfo){
    $featureMainProd = '';

  foreach ($featInfo as $feat){
    $featureMainProd .= '<figure id="hero">';
    $featureMainProd .= "<img src='$feat[invImage]' alt='$feat[invName] main feature image'>";
    $featureMainProd .= '</figure>';
    
    $featureMainProd .= '<section id="commentList">';
    $featureMainProd .= "<h2>$feat[invName]</h2>";
    $featureMainProd .= '<ul>';
    $featureMainProd .= "<li>$feat[invDescription]</li>";
    $featureMainProd .= "<li id='iWantLi'><a href='/acme/products/?action=details&productId=$feat[invId]&catId=$feat[categoryId]'><img src='images/site/iwantit.gif' alt='$feat[invName] main feature image' id='iWantImg'></a></li>";
    $featureMainProd .= '</ul>';
    $featureMainProd .= '</section>';
  }
  return $featureMainProd; 
}
