<?php
  if (isset($_SESSION['message'])){
    $message = $_SESSION['message'];
  }
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Image Management, ACME Inc.</title>
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
            <?php include $_SERVER['DOCUMENT_ROOT'].'/acme/common/header.php'; ?>
        </header>

        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/acme/common/nav.php'; ?>
        </nav>

        <main id="mainHome">
            <h1>Image Management</h1>
            <p>Welcome to the image management page. Choose one of the options below:</p>
            <h2>Add New Product Image</h2>
            <?php
              if (isset($message)){
                echo $message;
              }
            ?>
            <form action="/acme/uploads/" method="post" enctype="multipart/form-data">
                <label for='invItem'>Product</label><br>
                <?php echo $prodSelect; ?><br><br>
                <label>Upload Image:</label><br>
                <input type="file" name='file1'><br>
                <input type="submit" class="regbtn" value="Upload">
                <input type="hidden" name="action" value="upload">
            </form>
            <hr>
            <h2>Existing Image</h2>
            <p class="warning">If deleting an image, delete the thumbnail too and vice versa.</p>
            <?php 
              if(isset($imageDisplay)){
                echo $imageDisplay;
              }
            ?>
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT']."/acme/common/footer.php"; ?>
        </footer>
    </body>
</html>
<?php unset($_SESSION['message']); ?>