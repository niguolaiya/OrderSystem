<!DOCTYPE HTML>
<html>
<head>
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="Main.css" >
<style>
.error {color: #FF0000;}
</style>
</head>

<?php include 'NavBar.html';
// define variables and set to empty values
session_start();
$nameErr = $passErr = "";
$name = $pass = $comment = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["pass"])) {
    $passErr = " password is required";
  } else {
    $pass = test_input($_POST["pass"]);
  }


  // if (empty($_POST["comment"])) {
  //   $comment = "";
  // } else {
  //   $comment = test_input($_POST["comment"]);
  // }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<center>
<h2>Login</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  Password: <input type="text" name="pass" value="<?php echo $pass;?>">
  <br><br>
  <!-- Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br> -->
  <input type="submit" name="submit" value="Submit">
</form>
</center>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $pass;


?>

<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('sizheng', 'Dec371996', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

//put your query here
$query = "SELECT * FROM USER_T where USERNAME = '$name'";
$stid = oci_parse($conn,$query);

oci_define_by_name($stid, 'PASSWORD', $password);

oci_execute($stid,OCI_DEFAULT);

//iterate through each row
//while ($row = oci_fetch_array($stid,OCI_ASSOC))
while(oci_fetch($stid))
{
    //iterate through each item in the row and echo it
    if($password == $pass){
        //foreach ($row as $item)
        //{

            echo "WELCOME $name";
            echo $password;

            $_SESSION['username'] = $name;
            $_SESSION['loggedin'] = true;
        //}
      }

  echo '<br/>';
}
oci_free_statement($stid);
oci_close($conn);
?>
=======
    <style>
        #center-login {
            width: 300px;
            margin: 0 auto;
        }
        h2, h4 {
            text-align: center;
        }
        .form-element {
            display: flex;
        }
        .form-element label {
            padding-right: 10px;
            margin-bottom: 15px;
        }
        .form-element input {
            height: 15px;
            flex: 1;
        }
        #submit {
            margin: 1em 5em;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="Main.css" >
<body>

    <?php 
        include 'NavBar.html';
    ?>
    
    <?php
        // define variables and set to empty values
        session_start();
        $nameErr = $passErr = "";
        $name = $pass = $comment = $password = "";
        $userId = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["name"])) {
            $nameErr = "Name is required";
          } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
              $nameErr = "Only letters and white space allowed";
            }
          }

          if (empty($_POST["pass"])) {
            $passErr = " password is required";
          } else {
            $pass = test_input($_POST["pass"]);
          }


        }
    ?>
    
    <div id="body-content">
        <div id="center-login">
            <h2>Login</h2>
            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-element">
                    <label for="name">Name: </label>
                    <input id="name" type="text" name="name" value="<?php echo $name;?>">
                </div>
                <div class="form-element">
                    <label for="pass">Password: </label>
                    <input id="pass" type="text" name="pass" value="<?php echo $pass;?>">
                </div>
                <div class="form-element">
                    <input id="submit" type="submit" name="submit" value="Submit" style="height: 30px;">
                </div>
            </form>



            <?php
                // Remember to replace 'username' and 'password'!
                $conn = oci_connect('sizheng', 'Dec371996', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

                //put your query here
                $query = "SELECT * FROM USER_T where USERNAME = '$name'";
                $stid = oci_parse($conn,$query);

                oci_define_by_name($stid, 'PASSWORD', $password);

                oci_execute($stid,OCI_DEFAULT);

                //iterate through each row
                //while ($row = oci_fetch_array($stid,OCI_ASSOC))
                while(oci_fetch($stid))
                {
                    //iterate through each item in the row and echo it
                    if($password == $pass){
                        //foreach ($row as $item)
                        //{

                            echo "<h4>Welcome $name!</h4>";

                            $_SESSION['username'] = $name;
                            $_SESSION['loggedin'] = true;
                        //}
                      }

                  echo '<br/>';
                }
                oci_free_statement($stid);
                oci_close($conn);
            ?>
        </div>
        
    </div>
>>>>>>> origin/Database


</body>
</html>
