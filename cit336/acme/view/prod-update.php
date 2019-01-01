<?php
if (intval($_SESSION['clientData']['clientLevel']) < 2) {
  header('Location: /acme');
  exit;
}
?>
<?php
// Build the categories option list
$catList = '<select name="categoryId" id="categoryId" required>';
$catList .= '<option value="" disabled>Choose a Category</option>';
foreach ($categories as $category) {
  $catList .= "<option value ='$category[categoryId]'";
  if (isset($categoryId)) {
    if (intval($category['categoryId']) === $categoryId) {
      $catList .= ' selected ';
    }
  } elseif (isset($prodInf['categoryId'])){
      if($category['categoryId'] === $prodInf['categoryId']){
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
        <title><?php
            if (isset($prodInf['invName'])) {
              echo "Modify $prodInf[invName] ";
            } elseif (isset($invName)) {
              echo $invName;
            }
            ?> | Acme, Inc</title>
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
            <h1><?php
                if (isset($prodInf['invName'])) {
                  echo "Modify $prodInf[invName] ";
                } elseif (isset($invName)) {
                  echo $invName;
                }
                ?></h1>
            <?php
            if (isset($message)) {
              echo $message;
            }
            ?>
            <form action="/acme/products/index.php" method="get">
                <h3>Modify Product</h3>  

                <label for="categoryId">Category</label>
                <?php echo $catList ?>

                <label for="invName">Product Name</label>
                <input type="text" title="Product Name" name="invName" id="invName" required <?php
                if (isset($invName)) {
                  echo "value='$invName'";
                } elseif (isset($prodInf['invName'])) {
                  echo "value='$prodInf[invName]'";
                }
                ?>>

                <label for="invDescription">Product Description</label>
                <textarea title="Product Description" name="invDescription" id="invDescription" required><?php
                    if (isset($invDescription)) {
                      echo $invDescription;
                    } elseif (isset($prodInf['invDescription'])) {
                      echo $prodInf['invDescription'];
                    }
                    ?></textarea>

                <label for="invImage">Product Image (path to image)</label>
                <input type="text" title="Product Image" name="invImage" id="invImage" required <?php
                if (isset($invImage)) {
                  echo "value='$invImage'";
                } elseif (isset($prodInf['invImage'])) {
                  echo "value='$prodInf[invImage]'";
                }
                ?>>

                <label for="invThumbnail">Product Thumbnail (path to thumbnail)</label>
                <input type="text" title="Product Thumbnail" name="invThumbnail" id="invThumbnail" required <?php
                if (isset($invThumbnail)) {
                  echo "value='$invThumbnail'";
                } elseif (isset($prodInf['invThumbnail'])) {
                  echo "value='$prodInf[invThumbnail]'";
                }
                ?>>

                <label for="invPrice">Product Price</label>
                <input type="number" title="Product Price" name="invPrice" id="invPrice" step="0.01" min="0" required <?php
                if (isset($invPrice)) {
                  echo "value='$invPrice'";
                } elseif (isset($prodInf['invPrice'])) {
                  echo "value='$prodInf[invPrice]'";
                }
                ?>>

                <label for="invStock"># in Stock</label>
                <input type="number" title="Product in Stock" name="invStock" id="invStock" min="0" required <?php
                if (isset($invStock)) {
                  echo "value='$invStock'";
                } elseif (isset($prodInf['invStock'])) {
                  echo "value='$prodInf[invStock]'";
                }
                ?>>

                <label for="invSize">Shipping Size (W x H x L in inches)</label>
                <input type="number" title="Product Size" name="invSize" id="invSize" step="0.01" min="0" required <?php
                if (isset($invSize)) {
                  echo "value='$invSize'";
                } elseif (isset($prodInf['invSize'])) {
                  echo "value='$prodInf[invSize]'";
                }
                ?>>

                <label for="invWeight">Weight (lbs.)</label>
                <input type="number" title="Product Weight" name="invWeight" id="invWeight" step="0.01" min="0" required <?php
                if (isset($invWeight)) {
                  echo "value='$invWeight'";
                } elseif (isset($prodInf['invWeight'])) {
                  echo "value='$prodInf[invWeight]'";
                }
                ?>>

                <label for="invLocation">Location (city name)</label>
                <input type="text" title="Product Location" name="invLocation" id="invLocation" required <?php
                if (isset($invLocation)) {
                  echo "value='$invLocation'";
                } elseif (isset($prodInf['invLocation'])) {
                  echo "value='$prodInf[invLocation]'";
                }
                ?>>

                <label for="invVendor">Vendor Name</label>
                <input type="text" title="Product Vendor" name="invVendor" id="invVendor" required <?php
                if (isset($invVendor)) {
                  echo "value='$invVendor'";
                } elseif (isset($prodInf['invVendor'])) {
                  echo "value='$prodInf[invVendor]'";
                }
                ?>>

                <label for="invStyle">Primary Material</label>
                <input type="text" title="Primary Material" name="invStyle" id="invStyle" required <?php
                       if (isset($invStyle)) {
                         echo "value='$invStyle'";
                       } elseif (isset($prodInf['invStyle'])) {
                         echo "value='$prodInf[invStyle]'";
                       }
                       ?>>

                <input type="submit" value="Update Product">

                <input type="hidden" name="action" value="updateProd">
                <input type="hidden" name="invId" value="<?php 
                    if(isset($prodInf['invId'])){
                      echo $prodInf['invId'];
                    }elseif(isset($invId)){
                      echo $invId;
                    }
                  ?>">
            </form>

        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>
        </footer>
    </body>
</html>
