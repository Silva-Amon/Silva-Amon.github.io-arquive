<?php
if (intval($_SESSION['clientData']['clientLevel']) < 2) {
  header('Location: /acme');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title><?php
            if (isset($prodInf['invName'])) {
              echo "Remove from Recipe Feature $prodInf[invName]";
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
                  echo "Remove from Recipe Feature $prodInf[invName] ";
                } elseif (isset($invName)) {
                  echo $invName;
                }
                ?></h1>
            <p></p>
            <?php
            if (isset($message)) {
              echo $message;
            }
            ?>
            <form action="/acme/products/index.php" method="get">
                <h3>Confirm Product Feature.</h3>  

                <label for="invName">Product Name</label>
                <input type="text" title="Product Name" name="invName" id="invName" readonly <?php
                if (isset($prodInf['invName'])) {
                  echo "value='$prodInf[invName]'";
                }
                ?>>

                <label for="invDescription">Product Description</label>
                <textarea title="Product Description" name="invDescription" id="invDescription" readonly><?php
                    if (isset($prodInf['invDescription'])) {
                  echo $prodInf['invDescription'];
                }
                    ?></textarea>

                <input type="submit" value="Remove">

                <input type="hidden" name="action" value="feaRemove">
                <input type="hidden" name="invId" value="<?php 
                    if(isset($prodInf['invId'])){
                      echo $prodInf['invId'];
                    }
                  ?>">
            </form>

        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>
        </footer>
    </body>
</html>
