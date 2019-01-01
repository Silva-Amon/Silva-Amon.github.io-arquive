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

        <main>
            <h1>Sing In</h1>
            <?php
//            if (isset($message)) {
//                echo $message;
//            }
            if (isset($_SESSION['message'])){
               echo $_SESSION['message'];
            }
            ?>
            <form action="/acme/accounts/index.php" method="post">
                <label for="clientEmail">Email:</label>
                <input type="email" title="Email" name="clientEmail" id="clientEmail" required autofocus <?php 
                if(isset($clientEmail)){
                  echo "value='$clientEmail'";
                  
                }else if(isset($_SESSION['clientEmail'])){
                  echo "value='$_SESSION[clientEmail]'";
                } ?>>
                <label for="password">Password:</label>
                <input type="password" title="Password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                <span class="inputInf">There must be 8 characters, any of which may be numbers, any may be non-alphanumeric characters, they may be in any order and can include any number of capital and lower case letters.</span>
                <input type="hidden" name="action" value="Login">
                <button>Log in</button>
            </form>
            <a id="registerLink" href="/acme/accounts/index.php?action=registration">Create an Account</a>
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>
            <p>(Icons retraived from <a href="http://www.flaticon.com" title="flat icon is a free icon web site">flaticon.com</a>)</p>
        </footer>
    </body>
</html>