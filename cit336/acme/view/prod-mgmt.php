<?php
    if (intval($_SESSION['clientData']['clientLevel']) < 2) {
        header('Location: /acme/');
        exit;
    }
    if(isset($_SESSION['message'])){
      $message = $_SESSION['message'];
    }
    if(isset($_SESSION['prodFeatMessage'])){
      $prodFeatMessage = $_SESSION['prodFeatMessage'];
    }
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
            <h1>Product Management</h1>
            <?php
//            if (isset($message)) {
//                echo $message;
//            }
            ?>
            <p>Welcome to the product management page. Please choose one option below:</p>
            <ul>
                <li><a href="?action=newCat">Add a New Category</a></li>
                <li><a href="?action=newProd">Add a New Product</a></li>
            </ul>
            <?php
                if(isset($prodFeatMessage)){
                  echo $prodFeatMessage;
                }
                if (isset($message)) {
                    echo $message;
                }
                if (isset($prodList)) {
                    echo $prodList;
                }
            ?>
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>

        </footer>
    </body>
</html>
<?php unset($_SESSION['message']); ?>
<?php unset($_SESSION['prodFeatMessage']); ?>