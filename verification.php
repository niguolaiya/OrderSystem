<?php
session_start();

if(!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)){

echo '<script type= "text/javascript">
          window.location = "http://students.cs.ndsu.nodak.edu/~sizheng/login1.php"
      </script>';
}

 ?>
