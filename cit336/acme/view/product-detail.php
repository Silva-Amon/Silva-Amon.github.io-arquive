<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title><?php echo ($productDetailed[0]["invName"]); ?> Products | Acme, Inc.</title>
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
            <h1><?php echo ($productDetailed[0]["invName"]); ?></h1>
            <?php
            if (isset($message)) {
              echo $message;
            }
            ?>
            <?php
            if (isset($prodDisplay)) {
              echo $prodDisplay;
            }
            if(isset($thumbnailList)){
              echo '<h2>Product Thumbnails</h2>';
              echo $thumbnailList;
            }
            ?>
        </main>
        <footer>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>
        </footer>
    </body>
</html>