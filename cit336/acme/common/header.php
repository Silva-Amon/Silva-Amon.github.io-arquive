<a href="/acme/index.php"><img id="logo" src="/acme/images/site/logo.gif" alt="logo"></a>
   <?php
   if (isset($cookieFirstName)) {
      echo "<a href='/acme/accounts/index.php?action=admin'><span id='welcome'>Welcome $cookieFirstName</span></a>";
   }else if(isset($_COOKIE['firstname'])){
      echo "<a href='/acme/accounts/index.php?action=admin'><span id='welcome'>Welcome $_COOKIE[firstname]</span></a>";
   }
   ?>
<a
   <?php
   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
      echo ' href="/acme/accounts/index.php?action=Logout"><img id="accountFolder" src="/acme/images/site/account.gif" alt="my account">Log Out</a>';
   } else {
      echo ' href="/acme/accounts/index.php?action=login"><img id="accountFolder" src="/acme/images/site/account.gif" alt="my account">My Account</a>';
   }
   ?>
   