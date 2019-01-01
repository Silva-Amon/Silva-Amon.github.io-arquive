<?php
if (!isset($_SESSION['loggedin']) && !$_SESSION['loggedin']) {
  header('Location: /acme');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Update Client Info Acme, Inc</title>
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
            <h1>Update <?php echo $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname']; ?> Account</h1>
                <?php
                if (isset($message)) {
                  echo $message;
                }
                ?>
            <form action="/acme/accounts/" method="post">
                <fieldset>
                    <legend>User Information</legend>
                    <label for="clientFirstname">First Name</label>
                    <input type="text" title="First Name" name="clientFirstname" id="clientFirstname" required <?php
                    if (isset($clientFirstname)) {
                      echo "value='$clientFirstname'";
                    } elseif (isset($_SESSION['clientData']['clientFirstname'])) {
                      echo "value=" . $_SESSION['clientData']['clientFirstname'];
                    }
                    ?>>

                    <label for="clientLastname">Last Name</label>
                    <input type="text" title="Last Name" name="clientLastname" id="clientLastname" required <?php
                    if (isset($clientLastname)) {
                      echo "value='$clientLastname'";
                    } elseif (isset($_SESSION['clientData']['clientLastname'])) {
                      echo "value=" . $_SESSION['clientData']['clientLastname'];
                    }
                    ?>>
                    <label for="clientEmail">Email</label>
                    <input type="text" title="Email" name="clientEmail" id="clientEmail" required <?php
                    if (isset($clientEmail)) {
                      echo "value='$clientEmail'";
                    } elseif (isset($_SESSION['clientData']['clientEmail'])) {
                      echo "value=" . $_SESSION['clientData']['clientEmail'];
                    }
                    ?>>


                    <input type="submit" value="Update Account">

                    <input type="hidden" name="action" value="modifyClient">
                    <input type="hidden" name="clientId" value="<?php
                    if (isset($clientId)) {
                      echo $clientId;
                    } elseif (isset($_SESSION['clientData']['clientId'])) {
                      echo $_SESSION['clientData']['clientId'];
                    }
                    ?>">
                </fieldset>
            </form>
            <?php
                if (isset($messagePassword)) {
                  echo $messagePassword;
                }
                ?>
            <form action="/acme/accounts/" method="post">
                <fieldset>
                    <legend>Change Password</legend>
                    <label for="clientPassword">New Password</label>

                    <input type="password" title="New Password" id="clientPassword" name="clientPassword" required>
                    <span class="inputInf">There must be 8 characters, any of which may be numbers, any may be non-alphanumeric characters, they may be in any order and can include any number of capital and lower case letters.</span>
                    <input type="hidden" name="action" value="modifyPassword">
                    <input type="submit" value="Change Password">

                    <input type="hidden" name="clientId" value="<?php
                    if (isset($clientId)) {
                      echo $clientId;
                    } elseif (isset($_SESSION['clientData']['clientId'])) {
                      echo $_SESSION['clientData']['clientId'];
                    }
                    ?>">
                </fieldset>
            </form>

        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>
        </footer>
    </body>
</html>
