<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
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

<h2>login</h2>
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


</body>
</html>
