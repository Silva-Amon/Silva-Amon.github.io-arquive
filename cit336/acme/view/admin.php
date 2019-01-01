<?php
if (!$_SESSION['loggedin']) {
  header('Location: /acme/accounts/?action=login');
}
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
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
            <h1>Client Profile</h1>
            <h2>You are logged in, <?php echo $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname'] ?></h2>
            <?php if (isset($message)) {
              echo $message;
            } ?>
            <ul>
                <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname'] ?></li>
                <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname'] ?></li>
                <li>Email: <?php echo $_SESSION['clientData']['clientEmail'] ?></li>
            </ul>
            <a href="../accounts/index.php?action=updateClient">Update Account information</a>
            <?php
              if (intval($_SESSION['clientData']['clientLevel']) > 1) {
                echo "<h2>Products</h2>";
                echo "<p>Use the link bellow to administer the products</p>";
                echo '<p><a href="/acme/products/index.php">Products Section</a></p>';
              }
            ?>
        </main>
        <footer>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>
        </footer>
    </body>
</html>
<?php unset($_SESSION['message']); ?>