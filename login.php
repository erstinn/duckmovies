<?php
session_start();
// if user subscription is expired
if (isset($_SESSION['subbed']))
    if ($_SESSION['subbed'] == false)
        header('Location: subscribepage.php');

//for checking if already logged in
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) 
    header('Location: home.php');
?>

<html>
<style>
    .logo {
        position: absolute;
        width: 400px;
        height: 100px;
        opacity: 1;
    }

    .rectangle {
        position: absolute;
        right: 650px;
        top: 100px;
        width: 400px;
        height: 600px;
        background-color: black;
        border-radius: 5px;
        opacity: 0.8;
        font-family: verdana;
        font-weight: 600;
        font-size: 30;
        padding: 100px;
        color: #ffffff;
    }

    body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.527), rgba(0, 0, 0, 0.5)), url('moviebg.jpg');
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
    label[for=pass] {
        font-family: Monsterrat, sans-serif;
        font-size: 20px;
    }

    label[for=signin],
    label[for=trial] {
        font-family: Monsterrat, sans-serif;
        font-size: 20px;
        color: #ffd686;
    }

    a {
        text-decoration: none;
    }

    input[type=submit]:hover {
        background-color: #ffd686;
    }

    label[for=signin]:hover {
        color: #feb544;
    }
</style>

<body>
<?php error_reporting(E_ALL ^ E_NOTICE);

error_reporting(0);
?>

<img class="logo" src="logoduckmovies.png" />


<div class="rectangle">

Login<br><br>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

    <label for="mail">Email</label>
    <input type="email" id="e" name="email" placeholder="Email" required>
    <label for="pass">Password</label>
    <input type="password" id="p" name="password" placeholder="Password" required>
    <br>


    <input type="submit" name="submit" value="Sign In">

    <br><br><a href='register.php'><label for="signin">Sign up</label></a>


</form>


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

$current_date = date('Y-m-d');
    if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
        $pass = $_REQUEST["password"];
        $mail = $_REQUEST["email"];

        $stmt = "SELECT * FROM useraccounts WHERE `Password` = '$pass' AND `Email` = '$mail'";
        $result = $conn->query($stmt);
        if ($result->num_rows > 0){
            while($row=$result->fetch_assoc())
                $expiry_date = date('Y-m-d', strtotime($row['Date of Payment']. '+ 30 days'));
                if ($expiry_date < $current_date ){ 
                        // use SESSION variables to check if logged in for other pages 
                        $_SESSION['subbed'] == true;
                        $_SESSION['email'] = $mail;
                        $_SESSION['pass'] = $pass;
                        header('Location: home.php');
                }
                else{
                    $_SESSION['subbed'] == false;
                    header('location: subscribepage.php');
                }

        } else {
            echo "<font size='3' color='red'>Wrong email/password.</font>";
        }
        $conn->close();
    }
    



?>
</div>


</body>

</html>
</body>

</html>