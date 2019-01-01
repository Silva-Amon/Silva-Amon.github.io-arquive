<?php
    if (intval($_SESSION['clientData']['clientLevel']) < 2) {
        header('Location: /acme');
        exit;
    }
?>
<?php
$catList = '<select name="categoryId" id="categoryId" required>';
$catList .= '<option value="" disabled selected>Choose a Category</option>';
foreach ($categories as $category) {
   $catList .= "<option value ='$category[categoryId]'";
   if(isset($categoryId)){
      if (intval($category['categoryId']) === $categoryId){
         $catList .= ' selected ';
      }
   }
      $catList .= ">$category[categoryName]</option>";
   }
$catList .= '</select>';
?>
<!DOCTYPE html>
<html lang="en-us">
   <head>
      <title>ACME Inc.</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Amon T. B. da Silva">
      <meta name="description" content="ACME Inc. - trap, pitfall, snare, and so on">
      <link rel="stylesheet" media="screen and (max-width: 500px)" href="/acme/css/main.css">
      <link rel="stylesheet" media="screen and (min-width: 501px)" href="/acme/css/large.css">
      <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
   </head>
   <body>
      <header>
         <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
      </header>

      <nav>
         <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav.php'; ?>
      </nav>

      <main id="mainHome">
         <h1>Add Product</h1>
         <?php
         if (isset($message)) {
            echo $message;
         }
         ?>
         <form action="/acme/products/index.php" method="get">
            <h3>Add Product</h3>  

            <label for="categoryId">Category</label>
            <?php echo $catList ?>

            <label for="invName">Product Name</label>
            <input type="text" title="Product Name" name="invName" id="invName" required <?php if (isset($invName)) {
               echo "value='$invName'";
            } ?>>

            <label for="invDescription">Product Description</label>
            <textarea title="Product Description" name="invDescription" id="invDescription" required><?php if (isset($invDescription)) {
               echo $invDescription;
            } ?></textarea>

            <label for="invImage">Product Image (path to image)</label>
            <input type="text" title="Product Image" name="invImage" id="invImage" value="/acme/images/no-image.png" required <?php if (isset($invImage)) {
               echo "value='$invImage'";
            } ?>>

            <label for="invThumbnail">Product Thumbnail (path to thumbnail)</label>
            <input type="text" title="Product Thumbnail" name="invThumbnail" id="invThumbnail" required <?php if (isset($invThumbnail)) {
               echo "value='$invThumbnail'";
            } ?>>

            <label for="invPrice">Product Price</label>
            <input type="number" title="Product Price" name="invPrice" id="invPrice" step="0.01" min="0" required <?php if (isset($invPrice)) {
               echo "value='$invPrice'";
            } ?>>

            <label for="invStock"># in Stock</label>
            <input type="number" title="Product in Stock" name="invStock" id="invStock" min="0" required <?php if (isset($invStock)) {
               echo "value='$invStock'";
            } ?>>

            <label for="invSize">Shipping Size (W x H x L in inches)</label>
            <input type="number" title="Product Size" name="invSize" id="invSize" step="0.01" min="0" required <?php if (isset($invSize)) {
               echo "value='$invSize'";
            } ?>>

            <label for="invWeight">Weight (lbs.)</label>
            <input type="number" title="Product Weight" name="invWeight" id="invWeight" step="0.01" min="0" required <?php if (isset($invWeight)) {
               echo "value='$invWeight'";
            } ?>>

            <label for="invLocation">Location (city name)</label>
            <input type="text" title="Product Location" name="invLocation" id="invLocation" required <?php if (isset($invLocation)) {
               echo "value='$invLocation'";
            } ?>>

            <label for="invVendor">Vendor Name</label>
            <input type="text" title="Product Vendor" name="invVendor" id="invVendor" required <?php if (isset($invVendor)) {
               echo "value='$invVendor'";
            } ?>>

            <label for="invStyle">Primary Material</label>
            <input type="text" title="Primary Material" name="invStyle" id="invStyle" required <?php if (isset($invStyle)) {
               echo "value='$invStyle'";
            } ?>>

            <input type="submit" value="Add Product">

            <input type="hidden" name="action" value="regProduct">
         </form>

      </main>
      <footer>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>
      </footer>
   </body>
</html>