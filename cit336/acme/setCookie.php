<?php

setcookie("myCookies0", "Simple variable"); 
////"If [time] set to 0, or omitted, the cookie will expire at the end of the session (when the browser closes)."

/*
unset($_COOKIE["myCookies[0]"]);
unset($_COOKIE["myCookies[1]"]);
unset($_COOKIE["myCookies[2]"]);
setcookie("myCookies[0]", null, -1 , "/");
setcookie("myCookies[1]", null, -1 , "/");
setcookie("myCookies[2]", null, -1 , "/acme");
*/

setcookie("myCookies[first]", "first value", time() + 60 * 60 * 24 * 30, "/", "localhost");

setcookie("myCookies[second]", "second value", time() + 60 * 60 * 24 * 30, "/acme", "localhost", false, false);

echo $_COOKIE['myCookies0'] . '<br><br>';

if (isset($_COOKIE['myCookies'])){
   foreach ($_COOKIE['myCookies'] as $name => $value){
      $name = htmlspecialchars($name);
      $value = htmlspecialchars($value);
      echo "$name : $value <br>\n";
   }
}
?>