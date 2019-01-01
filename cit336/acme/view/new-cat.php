<?php
    if (intval($_SESSION['clientData']['clientLevel']) < 2) {
        header('Location: /acme');
        exit;
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
         <h1>Add Category</h1>
         <?php
         if (isset($message)) {
            echo $message;
         }
         ?>
         <form action="/acme/products/index.php" method="get">
            <h3>Add a new category of products below.</h3>
            <label for="categoryName">New Category Name:</label>
            <input type="text" title="Category Name" name="categoryName" id="categoryName" required>
            <input type="submit" value="Add Category">
            <input type="hidden" name="action" value="registerCat">
         </form>

      </main>
      <footer>
         <?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>
      </footer>
   </body>
</html>