<?php
session_start();
?>

<html>
<style>

.logo{
    position: absolute;
    width: 400px;
    height: 100px;
    opacity: 1;
}
.rectangle{
    position: absolute;
    right: 700px;
    top: 100px;
    width: 400px;
    height: 600px;
    background-color: black;
    border-radius: 5px;
    opacity: 0.7;
    font-family: verdana;
    font-weight: 600;
    font-size: 30;
    padding: 100px;
    color: #ffffff;
}

body{
    background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)) , url('moviebg.jpg');
}

input[type=text],
input[type=number],
input[type=email],
input[type=password],
select {
    width: 400px;
    height: 65px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    background-color: #35393b;
    color: white;
}

input[type=submit] {
    width: 400px;
    height: 70px;
    background-color: #feb544;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 25px;
    font-family: Monsterrat, sans-serif;
}

label[for=mail], 
label[for=sub], 
label[for=pass]{
    font-family: Monsterrat, sans-serif;
    font-size: 20px;
}

label[for=signin]{
    font-family: Monsterrat, sans-serif;
    font-size: 20px;
    color: #ffd686;
}

a{
    text-decoration: none;
}

input[type=submit]:hover {
background-color: #ffd686;
}


</style>

<body>
<?php error_reporting(E_ALL ^ E_NOTICE); 

error_reporting(0);
?>

<img class ="logo" src = "logoduckmovies.png"/>


<div class = "rectangle">

Create account<br><br>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

      <label for="mail">Email</label>
      <input type="email" id="e" name="email" placeholder="Email" required>
      <label for="pass">Password</label>
      <input type="password" id="p" name="password" placeholder="Password" required>
      <br>
      <label for="pass">Confirm Password</label>
      <input type="password" id=" p" name="confirm_passw" placeholder="Confirm your password.." required>
      <?php
      if ($_POST['password'] !== $_POST['confirm_passw']) {
        echo "<font size='3' color='red'>Passwords did not match</font>";
        $check = true;
      }
      ?><br><br>
    
      <input type="checkbox" name="subscribe" ><label for="sub">  Subscribe to premium</label><br><br>
      
      <input type="submit" name="submit" value="Sign Up">

      <br><br><a href='login.php'><label for="signin">Sign in</label></a>
      
    </form>

</div>

<?php

$servername = "localhost";
$username = "mici";
$password = "missy08";
$dbname = "duckmovies";
$port = "3308";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



if (isset($_POST['submit']) && $check != true) {
    if(!empty($_POST['subscribe'])){
        $pass = $_REQUEST["password"];
        $mail = $_REQUEST["email"];

        header('location: subscribepage.php');
        $stmt = "INSERT INTO useraccounts (`Email`,`Password`) VALUES ('$mail', '$pass')";

        if (mysqli_query($conn, $stmt)) {
            echo "<h4>Data stored in a database successfully.</h4>";
        } else {
            echo "ERROR: Sorry $stmt. "
            . mysqli_error($conn);
        }
        $conn->close();
    }
    else{
        header('location: home.php');
    }
}



?>

</body>

</html>
</body>
</html>

