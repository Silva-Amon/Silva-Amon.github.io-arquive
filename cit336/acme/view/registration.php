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
         <h1>Sign Up</h1>
         <?php
         if (isset($message)) {
            echo $message;
         }
         ?>
         <form action="/acme/accounts/index.php" method="post">
            <label for="clientFirstname">First name:</label>
            <input type="text" title="First name" name="clientFirstname" id="clientFirstname" required <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?>>
            <label for="clientLastname">Last name:</label>
            <input type="text" title="Last name" name="clientLastname" id="clientLastname" required <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?>>
            <label for="clientEmail">Email address:</label>
            <input type="email" title="Email address" name="clientEmail" id="clientEmail" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>>
            <label for="clientPassword">Password:</label>
            <span class="inputInf">There must be 8 characters, any of which may be numbers, any may be non-alphanumeric characters, they may be in any order and can include any number of capital and lower case letters.</span>
            <input type="password" title="Client Password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
            <input type="submit" name="submit" id="regbtn" value="Create an Account">
            <!--Add the action nam - value pair--> 
            <input type="hidden" name="action" value="register">
         </form>

      </main>
      <footer>
         <?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>
         <p>(Icons retraived from <a href="http://www.flaticon.com" title="flat icon is a free icon web site">flaticon.com</a>)</p>
      </footer>
   </body>
</html>